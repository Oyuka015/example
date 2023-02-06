<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Online;
use App\Models\Codelists;

use App\Repositories\Online\OnlineInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;
use App\Models\Online as OnlineCourse;
use \DB;
use Storage;
use \Validator as Validator;
use \View as View;
use Config;
use Auth;

class OnlineController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(OnlineInterface $online) {
        $this->online = $online;
        $this->view_path = 'admin.online';
    }

    public function index(Request $request)
    {
        return view($this->view_path.'.index');
    }

    public function create()
    {
        // dd(Config::get('codelists.codelist')['lesson_group_parent_id']);
        $l_groups = Codelists::where('parent_id', Config::get('codelists.codelist')['lesson_group_parent_id'])->get();
        
        $data['lesson_groups'] = $l_groups;
        return view($this->view_path.'.add', $data);
    }

    public function edit($id)
    {
        $online = $this->online->find($id);
        $l_groups = Codelists::where('parent_id', Config::get('codelists.codelist')['lesson_group_parent_id'])->get();
        
        $data['lesson_groups'] = $l_groups;
        $data['online'] = $online;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file0' => 'required|file|mimetypes:video/mp4',
            'pdf0' => 'required|file|mimetypes:application/pdf',
        ]);
        $validator = Validator::make($request->input(), Online::$rules);
        // process the save
        if ($validator->fails()) 
        {
            $response = array(
                'status' => 'error',
                'msg' => trans('messages.error_save'),
                'errors' => $validator->errors()
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        } 
        else 
        {
            $app = $this->online->create($request->input(), $request->file());
            $response = array(
                'status' => 'success',
                'msg' => trans('messages.success_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
    }

    public function update($id, Request $request)
    {
        
        $validator = Validator::make($request->input(), Online::$rules);
        // process the save
        if ($validator->fails()) 
        {
            $response = array(
                'status' => 'error',
                'msg' => trans('messages.error_save'),
                'errors' => $validator->errors()
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        } 
        else 
        {
            $app = $this->online->update($id, $request->input());
            $response = array(
                'status' => 'success',
                'msg' => trans('messages.success_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
    }

    public function dataTableList(Request $request)
    {
        return $this->online->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->online->delete($id);
        unlinkVideo($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }

    public function unlinkVideo($id){
        $data = Online::find($id);
        unlink('/'.$data->video);
    }

    public function uploadVideo(Request $request)
    {
        $this->validate($request, [
            'lesson_name' => 'required|string|max:255',
            'file0' => 'required|file|mimetypes:video/mp4',
        ]);
        $video = new OnlineCourse;
        $video->lesson_name = $request->lesson_name;
        if ($request->file('file0'))
        {
            $path = $request->file('file0')->store('videos', ['disk' => 'my_files']);
            $video->video = $path;
            // dd($video, 'sda');
        }
        dd($video);
        $video->save();
    
    }
}
