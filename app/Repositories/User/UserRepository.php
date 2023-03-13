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
        $users = new User;
        // dd($input);
        $users->username = @$input['username'];
        $users->citizenship = @$input['citizenship'];
        $users->family_name = @$input['family_name'];
        $users->firstname = @$input['firstname'];
        $users->lastname = @$input['lastname'];
        $users->register = @$input['register'];
        $users->age = @$input['age'];
        $users->gender = @$input['gender'];
        $users->work_status = @$input['work'];
        $users->email = @$input['email'];
        $users->phone = @$input['phone'];
        $users->special_person = @$input['in-case-name'];
        $users->special_phone = @$input['in-case-number'];
        $users->province_capital = @$input['province-capital'];
        $users->district = @$input['district'];
        $users->education_degree = @$input['education-degree'];
        $users->home_address = @$input['home_address'];
        $users->school = @$input['school'];
        $users->grad = @$input['grad'];
        $users->occupation = @$input['occupation'];
        $users->gpa = @$input['gpa'];
        $users->diploma_number = @$input['diploma_number'];
        $users->diploma_register = @$input['diploma_register'];
        $users->diploma_doc = @$input['diploma_doc'];
        $users->password = md5(@$input['password']);
        $users->role_id = 2;
        $users->is_active = true;
        $users->is_active = false;

        if ($file['file0'])
        {
            $path = $file['file0']->store('images', ['disk' => 'my_files']);
            $users->image_url = $path;
        }
        // dd($users);
        return $users->save();
    }

    public function update($id, $input, $file)
    {
        $users = User::find($id);
        $users->username = @$input['username'];
        $users->citizenship = @$input['citizenship'];
        $users->family_name = @$input['family_name'];
        $users->firstname = @$input['firstname'];
        $users->lastname = @$input['lastname'];
        $users->register = @$input['register'];
        $users->age = @$input['age'];
        $users->gender = @$input['gender'];
        $users->work_status = @$input['work'];
        $users->email = @$input['email'];
        $users->phone = @$input['phone'];
        $users->special_person = @$input['in-case-name'];
        $users->special_phone = @$input['in-case-number'];
        $users->province_capital = @$input['province-capital'];
        $users->district = @$input['district'];
        $users->education_degree = @$input['education-degree'];
        $users->home_address = @$input['home_address'];

        if ($file['file0'])
        {
            $path = $file['file0']->store('images', ['disk' => 'my_files']);
            $users->image_url = $path;
        }
        return $users->save();
    }

    public function delete($id)
    {
        $users = User::find($id);
        return $users->delete();
    }

    public function getDatatableList($searchData)
    {

        $users = User::select('*');
        $qry = $users;
        
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
            ->addColumn('action', function ($users) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary users-edit" style="margin:3px" data-usersid="'.@$users->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger users-delete" style="margin:3px" data-usersid="'.@$users->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}