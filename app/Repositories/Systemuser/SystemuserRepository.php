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
        // $faq->question = @$input['question'];
        // $faq->answer = @$input['answer'];
        $systemuser->name = @$input['name'];
        $systemuser->code = @$input['code'];

        return $systemuser->save();
    }

    public function update($id, $input)
    {
        $systemuser = Systemuser::find($id);

        // $faq->question = @$input['question'];
        // $faq->answer = @$input['answer'];
        $systemuser->name = @$input['name'];
        $systemuser->code = @$input['code'];

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

                // if($searchData->has('question') && $searchData->get('question') !== null)
                // {
                //     $qry->whereRaw('LOWER(question) like ?', array('%'.mb_strtolower($searchData->get('question')).'%'));
                // }
                if($searchData->has('code') && $searchData->get('code') !== null)
                {
                    $qry->where('code', $searchData->get('code'));
                }

                if($searchData->has('name') && $searchData->get('name') !== null)
                {
                    $qry->whereRaw('LOWER(name) like ?', array('%'.mb_strtolower($searchData->get('name')).'%'));
                }
            })
            ->addColumn('action', function ($place) {
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