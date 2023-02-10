<?php

namespace App\Repositories\User;


use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use File;

class UserRepository implements UserInterface
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create($input, $file)
    {
        $user = new User;
        $user->username = @$input['username'];
        $user->username = @$input['username'];
        $user->email = @$input['email'];
        $user->phone = @$input['phone'];
        $user->lastname = @$input['lastname'];
        $user->firstname = @$input['firstname'];
        $user->register = @$input['register'];
        $user->password = md5(@$input['password']);

        

        return $user->save();
    }

    public function update($id, $input, $file)
    {
        $user = User::find($id);

        dd(md5( @$input['old_password']));  
        $user->username = @$input['username'];
        $user->email = @$input['email'];
        $user->phone = @$input['phone'];
        $user->lastname = @$input['lastname'];
        $user->firstname = @$input['firstname'];
        $user->register = @$input['register'];
        $user->old_password =md5( @$input['old_password']);
        $user->password = md5(@$input['password']);

        if($file){
            if(@$file['file0']){
                File::delete(public_path($user->image_url));
                $path = $file['file0']->store('images', ['disk' => 'my_files']);
                $user->image_url = $path;
            }
        }

        return $user->save();
    }

    public function delete($id)
    {
        $user = User::find($id);
        return $user->delete();
    }

    public function getDatatableList($searchData)
    {

        $user = User::select('*');
        $qry = $user;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                // if($searchData->has('question') && $searchData->get('question') !== null)
                // {
                //     $qry->whereRaw('LOWER(question) like ?', array('%'.mb_strtolower($searchData->get('question')).'%'));
                // }
                if($searchData->has('username') && $searchData->get('username') !== null)
                {
                    $qry->where('username', $searchData->get('username'));
                }
            })
            ->addColumn('action', function ($user) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary user-edit" style="margin:3px" data-userid="'.@$user->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger user-delete" style="margin:3px" data-userid="'.@$user->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}