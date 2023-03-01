<?php

namespace App\Repositories\Certificate;


use App\Repositories\Certificate\CertificateInterface as CertificateInterface;
use App\Models\Certificate;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\Certif_User_id as Ids;
use App\Models\Users as User;
use \Carbon\Carbon;

use \Auth;

class CertificateRepository implements CertificateInterface
{
    public function all()
    {
        return Certificate::all();
    }

    public function find($id)
    {
        return Certificate::find($id);
    }

    public function create($id)
    {
        $user = User::find($id);
        // dd($user);
        $user->license_active = true;
        $user->save();

        $certificate = new Certificate;
        $certificate->user_id = $user->id;

        $certificate->register = @$user['register'];
        $certificate->lastname = @$user['lastname'];
        $certificate->firstname = @$user['firstname'];
        // $certificate->valid_for = @$input['valid_for'];
        // $certificate->signature = @$input['signature'];
        $certificate->created_by = @Auth::user()->id;
        $certificate->save();

        return $certificate;
    }

    public function update($id, $input)
    {
        $certificate = Certificate::find($id);

        $certificate->user_name = @$input['user_name'];
        $certificate->certificate_id = @$input['certificate_id'];
        $certificate->register = @$input['register'];
        $certificate->registered_date = @$input['registered_date'];
        $certificate->registered_user = @$input['registered_user'];
        $certificate->lastname = @$input['lastname'];
        $certificate->surname = @$input['surname'];
        $certificate->valid_for = @$input['valid_for'];
        $certificate->signature = @$input['signature'];

        return $certificate->save();
    }

    public function delete($id)
    {
        // dd($id);
        $certificate = Certificate::find($id);
        // dd($certificate->twoId->users);

        $user = $certificate->twoId->users;
        $user->license_active = false;
        $user->save();

        $ids = $certificate->twoId;
        $ids->delete();
        $certificate->delete();
        return $certificate;
    }

    public function getDatatableList($searchData)
    {

        $certificate = Certificate::select('*');
        $qry = $certificate;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                // if($searchData->has('lastname') && $searchData->get('lastname') !== null)
                // {
                //     $qry->whereRaw('LOWER(lastname) like ?', array('%'.mb_strtolower($searchData->get('lastname')).'%'));
                // }
                // if($searchData->has('surname') && $searchData->get('surname') !== null)
                // {
                //     $qry->whereRaw('LOWER(surname) like ?', array('%'.mb_strtolower($searchData->get('surname')).'%'));
                // }
                // if($searchData->has('certificate_id') && $searchData->get('certificate_id') !== null)
                // {
                //     $qry->where('certificate_id', $searchData->get('certificate_id'));
                // }
                if($searchData->has('certificate_id') && $searchData->get('certificate_id') !== null)
                {
                    $qry->where('certificate_id', $searchData->get('certificate_id'));
                }
            })
            ->addColumn('action', function ($certificate) {
                $actionHtml = "";
                // $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary certificate-edit" style="margin:3px" data-certificateid="'.@$certificate->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="/admin/certificate/download/'.@$certificate->id.'" target="_blank" class="btn btn-circle btn-primary certificate-download" style="margin:3px" data-certificateid="'.@$certificate->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.download\')}}"><i class="fa fa-download"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger certificate-delete" style="margin:3px" data-certificateid="'.@$certificate->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}