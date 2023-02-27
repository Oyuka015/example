<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Dashboard;


use App\Repositories\Dashboard\DashboardInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;
use App\Models\User;
use Session;

use \DB;
use Storage;
use \Validator as Validator;
use \View as View;

class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(DashboardInterface $dashboard) {
        $this->dashboard = $dashboard;
        $this->view_path = 'admin.dashboard';
    }

    public function index(Request $request)
    {
        $user = Session::get('login_user');
        $user_Data = User::find($user->id);

        // dd($user_Data);
        $data['userData'] = $user_Data;
        
        return View::make('admin.dashboard.index', $data);
    }

    public function create()
    {
        return view($this->view_path.'.add');
    }

    public function edit($id)
    {
        $dashboard = $this->dashboard->find($id);

        $data['dashboard'] = $dashboard;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), Dashboard::$rules);
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
            $app = $this->dashboard->create($request->input());
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
        
        $validator = Validator::make($request->input(), Dashboard::$rules);
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
            $app = $this->dashboard->update($id, $request->input());
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
        return $this->dashboard->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->dashboard->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }
}

