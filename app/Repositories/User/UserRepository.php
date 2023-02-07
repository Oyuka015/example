<?php

namespace App\Repositories\User;


use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

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

    public function create($input)
    {
        $user = new User;
        // dd($input);
        $user->username = @$input['username'];
        $user->citizenship = @$input['citizenship'];
        $user->family_name = @$input['family_name'];
        $user->firstname = @$input['firstname'];
        $user->lastname = @$input['lastname'];
        $user->register = @$input['register'];
        $user->age = @$input['age'];
        $user->gender = @$input['gender'];
        $user->work_status = @$input['work'];
        $user->email = @$input['email'];
        $user->phone = @$input['phone'];
        $user->special_person = @$input['in-case-name'];
        $user->special_phone = @$input['in-case-number'];
        $user->province_capital = @$input['province-capital'];
        $user->district = @$input['district'];
        $user->education_degree = @$input['education-degree'];
        $user->home_address = @$input['home_address'];
        $user->school = @$input['school'];
        $user->grad = @$input['grad'];
        $user->occupation = @$input['occupation'];
        $user->gpa = @$input['gpa'];
        $user->diploma_number = @$input['diploma_number'];
        $user->diploma_register = @$input['diploma_register'];
        $user->diploma_doc = @$input['diploma_doc'];
        $user->password = md5(@$input['password']);

        return $user->save();
    }

    public function update($id, $input)
    {
        $user = User::find($id);

        $user->username = @$input['username'];
        $user->citizenship = @$input['citizenship'];
        $user->family_name = @$input['family_name'];
        $user->firstname = @$input['firstname'];
        $user->lastname = @$input['lastname'];
        $user->register = @$input['register'];
        $user->age = @$input['age'];
        $user->gender = @$input['gender'];
        $user->work_status = @$input['work'];
        $user->email = @$input['email'];
        $user->phone = @$input['phone'];
        $user->special_person = @$input['in-case-name'];
        $user->special_phone = @$input['in-case-number'];
        $user->province_capital = @$input['province-capital'];
        $user->district = @$input['district'];
        $user->education_degree = @$input['education-degree'];
        $user->home_address = @$input['home_address'];

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