<?php

namespace App\Repositories\Users;


use App\Repositories\Users\UsersInterface as UsersInterface;
use App\Models\Users;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class UsersRepository implements UsersInterface
{
    public function all()
    {
        return Users::all();
    }

    public function find($id)
    {
        return Users::find($id);
    }

    public function create($input)
    {
        $users = new Users;
        $systemuser->username = @$input['username'];
        $systemuser->citizenship = @$input['citizenship'];
        $systemuser->family_name = @$input['family_name'];
        $systemuser->firstname = @$input['firstname'];
        $systemuser->lastname = @$input['lastname'];
        $systemuser->register = @$input['register'];
        $systemuser->age = @$input['age'];
        $systemuser->gender = @$input['gender'];
        $systemuser->work_status = @$input['work'];
        $systemuser->email = @$input['email'];
        $systemuser->phone = @$input['phone'];
        $systemuser->special_person = @$input['in-case-name'];
        $systemuser->special_phone = @$input['in-case-number'];
        $systemuser->province_capital = @$input['province-capital'];
        $systemuser->district = @$input['district'];
        $systemuser->education_degree = @$input['education-degree'];
        $systemuser->home_address = @$input['home_address'];

        return $users->save();
    }

    public function update($id, $input)
    {
        $users = Users::find($id);

        $systemuser->username = @$input['username'];
        $systemuser->citizenship = @$input['citizenship'];
        $systemuser->family_name = @$input['family_name'];
        $systemuser->firstname = @$input['firstname'];
        $systemuser->lastname = @$input['lastname'];
        $systemuser->register = @$input['register'];
        $systemuser->age = @$input['age'];
        $systemuser->gender = @$input['gender'];
        $systemuser->work_status = @$input['work'];
        $systemuser->email = @$input['email'];
        $systemuser->phone = @$input['phone'];
        $systemuser->special_person = @$input['in-case-name'];
        $systemuser->special_phone = @$input['in-case-number'];
        $systemuser->province_capital = @$input['province-capital'];
        $systemuser->district = @$input['district'];
        $systemuser->education_degree = @$input['education-degree'];
        $systemuser->home_address = @$input['home_address'];

        return $users->save();
    }

    public function delete($id)
    {
        $users = Users::find($id);
        return $users->delete();
    }

    public function getDatatableList($searchData)
    {

        $users = Users::select('*');
        $qry = $users;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                // if($searchData->has('question') && $searchData->get('question') !== null)
                // {
                //     $qry->whereRaw('LOWER(question) like ?', array('%'.mb_strtolower($searchData->get('question')).'%'));
                // }
                if($searchData->has('firstname') && $searchData->get('firstname') !== null)
                {
                    $qry->where('firstname', $searchData->get('firstname'));
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