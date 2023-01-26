<?php

namespace App\Repositories\Examtakers;


use App\Repositories\Examtakers\ExamtakersInterface as ExamtakersInterface;
use App\Models\Examtakers;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class ExamtakersRepository implements ExamtakersInterface
{
    public function find($id)
    {
        return Examtakers::find($id);
    }

    public function create($input)
    {
        $examtakers = new Examtakers;

        $examtakers->user_name = @$input['user_name'];
        $examtakers->family_name = @$input['family_name'];
        $examtakers->surname = @$input['surname'];
        $examtakers->lastname = @$input['lastname'];
        $examtakers->register = @$input['register'];
        $examtakers->email = @$input['email'];
        $examtakers->phone = @$input['phone'];
        $examtakers->citizenship = @$input['citizenship'];

        return $examtakers->save();
    }

    public function update($id, $input)
    {
        $examtakers = Examtakers::find($id);

        $examtakers->user_name = @$input['user_name'];
        $examtakers->family_name = @$input['family_name'];
        $examtakers->surname = @$input['surname'];
        $examtakers->lastname = @$input['lastname'];
        $examtakers->register = @$input['register'];
        $examtakers->email = @$input['email'];
        $examtakers->phone = @$input['phone'];
        $examtakers->citizenship = @$input['citizenship'];

        return $examtakers->save();
    }

    public function delete($id)
    {
        $examtakers = Examtakers::find($id);
        return $examtakers->delete();
    }

    public function getDatatableList($searchData)
    {

        $examtakers = Examtakers::select('*');
        $qry = $examtakers;
        
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
                if($searchData->has('register') && $searchData->get('register') !== null)
                {
                    $qry->where('register', $searchData->get('register'));
                }
                if($searchData->has('phone') && $searchData->get('phone') !== null)
                {
                    $qry->where('phone', $searchData->get('phone'));
                }

            })
            ->addColumn('action', function ($place) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary examtakers-edit" style="margin:3px" data-examtakersid="'.@$examtakers->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger examtakers-delete" style="margin:3px" data-examtakersid="'.@$examtakers->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}