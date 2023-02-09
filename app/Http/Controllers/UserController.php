<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Parcel;
use App\Models\Place;
use App\Models\Point;
use App\Models\PlaceServes;
use App\Models\PlaceTime;
use App\Models\PlaceTypes;
use App\Models\User;
use Session;
// use App\Models\UserRole;

use App\Repositories\User\UserInterface;

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

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(UserInterface $user) {
        $this->user = $user;
        $this->view_path = 'user';
    }

    public function index(Request $request)
    {
        $user = Session::get('login_user');
        $user_Data = User::find($user->id);

        // dd($user_Data);
        $data['userData'] = $user_Data;
        
        return View::make('user.profile', $data);
    }

    public function create()
    {
        $userRoles = UserRole::all();

        $data['roles'] = $userRoles;

        return view($this->view_path.'.add', $data);
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $userRoles = UserRole::all();

        $data['roles'] = $userRoles;
        $data['user'] = $user;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->input(), User::$rules);
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
            $app = $this->user->create($request->input(), $request->file());
            $response = array(
                'status' => 'success',
                'msg' => trans('messages.success_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
    }
    // public function uploadImage(Request $request)
    // {
    //     $this->validate($request, [
    //         'file0' => 'required|file|mimetypes:image/*',
    //     ]);
    //     $image = new User;
    //     if ($request->file('file0'))
    //     {
    //         $path = $request->file('file0')->store('images', ['disk' => 'my_files']);
    //         $image->image_url = $path;
    //         // dd($image, 'sda');
    //     }
    //     dd($image);
    //     $image->save();
    
    // }

    public function update($id, Request $request)
    {
        
        // dd('sdf');
        $rules = array(
            // 'username' => 'required',
            // 'register' => 'required',
            // 'lastname' => 'required',
            // 'firstname' => 'required',
            // 'email' => 'required',
            // 'phone' => 'required',
            // 'password' => 'required',
            // 'role_id' => 'required',
        );
        $validator = Validator::make($request->input(), $rules);
        // process the save
        if ($validator->fails()) 
        {
            // dD('ssss');
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
            // dd('dcfd');
            $app = $this->user->update($id, $request->input(), $request->file(),);
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
        return $this->user->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->user->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }

    
}
