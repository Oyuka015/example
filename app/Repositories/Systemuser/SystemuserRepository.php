<?php

namespace App\Repositories\Systemuser;


use App\Repositories\Systemuser\SystemuserInterface as SystemuserInterface;
use App\Models\Systemuser;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class SystemuserRepository implements SystemuserInterface
{
    public function find($id)
    {
        return Systemuser::find($id);
    }

    public function create($input)
    {
        $systemuser = new Systemuser;
        $systemuser->user_name = @$input['user_name'];
        $systemuser->citizenship = @$input['citizenship'];
        $systemuser->family_name = @$input['family_name'];
        $systemuser->surname = @$input['surname'];
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

        return $systemuser->save();
    }

    public function update($id, $input)
    {
        $systemuser = Systemuser::find($id);

        $systemuser->user_name = @$input['user_name'];
        $systemuser->province = @$input['province'];
        $systemuser->surname = @$input['surname'];
        $systemuser->lastname = @$input['lastname'];
        $systemuser->email = @$input['email'];
        $systemuser->phone = @$input['phone'];
        $systemuser->active_status = @$input['active_status'];

        return $systemuser->save();
    }

    public function delete($id)
    {
        $systemuser = Systemuser::find($id);
        return $systemuser->delete();
    }

    public function getDatatableList($searchData)
    {

        $systemuser = Systemuser::select('*');
        $qry = $systemuser;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('user_name') && $searchData->get('user_name') !== null)
                {
                    $qry->whereRaw('LOWER(user_name) like ?', array('%'.mb_strtolower($searchData->get('user_name')).'%'));
                }
                if($searchData->has('surname') && $searchData->get('surname') !== null)
                {
                    $qry->whereRaw('LOWER(surname) like ?', array('%'.mb_strtolower($searchData->get('surname')).'%'));
                }
                if($searchData->has('lastname') && $searchData->get('lastname') !== null)
                {
                    $qry->whereRaw('LOWER(lastname) like ?', array('%'.mb_strtolower($searchData->get('lastname')).'%'));
                }
            })
            ->addColumn('action', function ($systemuser) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary systemuser-edit" style="margin:3px" data-systemuserid="'.@$systemuser->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger systemuser-delete" style="margin:3px" data-systemuserid="'.@$systemuser->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}