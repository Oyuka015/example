<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Users;

use App\Repositories\Users\UsersInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;

use \DB;
use Storage;
use \Validator as Validator;
use \View as View;

class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(UsersInterface $users) {
        $this->users = $users;
        $this->view_path = 'admin.users';
    }

    public function index(Request $request)
    {
        return view($this->view_path.'.index');
    }

    public function create()
    {
        return view($this->view_path.'.add');
    }

    public function edit($id)
    {
        $users = $this->users->find($id);

        $data['users'] = $users;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), Users::$rules);
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
            $app = $this->users->create($request->input());
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
        
        $validator = Validator::make($request->input(), Users::$rules);
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
            $app = $this->users->update($id, $request->input());
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
        return $this->users->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->users->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }
}