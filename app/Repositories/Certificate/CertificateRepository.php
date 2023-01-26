<?php

namespace App\Repositories\Certificate;


use App\Repositories\Certificate\CertificateInterface as CertificateInterface;
use App\Models\Certificate;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class CertificateRepository implements CertificateInterface
{
    public function find($id)
    {
        return Certificate::find($id);
    }

    public function create($input)
    {
        $certificate = new Certificate;
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
        $certificate = Certificate::find($id);
        return $certificate->delete();
    }

    public function getDatatableList($searchData)
    {

        $certificate = Certificate::select('*');
        $qry = $certificate;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('lastname') && $searchData->get('lastname') !== null)
                {
                    $qry->whereRaw('LOWER(lastname) like ?', array('%'.mb_strtolower($searchData->get('lastname')).'%'));
                }
                if($searchData->has('surname') && $searchData->get('surname') !== null)
                {
                    $qry->whereRaw('LOWER(surname) like ?', array('%'.mb_strtolower($searchData->get('surname')).'%'));
                }
                if($searchData->has('certificate_id') && $searchData->get('certificate_id') !== null)
                {
                    $qry->whereRaw('certificate_id', $searchData->get('certificate_id'));
                }
            })
            ->addColumn('action', function ($place) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary certificate-edit" style="margin:3px" data-certificateid="'.@$certificate->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger certificate-delete" style="margin:3px" data-certificateid="'.@$certificate->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}