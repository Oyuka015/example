<?php

namespace App\Repositories\Result;


use App\Repositories\Result\ResultInterface as ResultInterface;
use App\Models\Result;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class ResultRepository implements ResultInterface
{
    public function find($id)
    {
        return Result::find($id);
    }

    public function create($input)
    {
        $result = new Result;

        $result->user_name = @$input['user_name'];
        $result->exam_1 = @$input['exam_1'];
        $result->exam_2 = @$input['exam_2'];

        return $result->save();
    }

    public function update($id, $input)
    {
        $result = Result::find($id);

        $result->user_name = @$input['user_name'];
        $result->exam_1 = @$input['exam_1'];
        $result->exam_2 = @$input['exam_2'];

        return $result->save();
    }

    public function delete($id)
    {
        $result = Result::find($id);
        return $result->delete();
    }

    public function getDatatableList($searchData)
    {

        $result = Result::select('*');
        $qry = $result;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('user_name') && $searchData->get('user_name') !== null)
                {
                    $qry->whereRaw('LOWER(user_name) like ?', array('%'.mb_strtolower($searchData->get('user_name')).'%'));
                }

            })
            ->addColumn('action', function ($result) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary result-edit" style="margin:3px" data-resultid="'.@$result->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger result-delete" style="margin:3px" data-resultid="'.@$result->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}