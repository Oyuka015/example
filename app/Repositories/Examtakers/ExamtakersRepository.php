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

        $examtakers->user_id = @$input['user_id'];
        $examtakers->exam_id = @$input['exam_id'];
        $examtakers->score = @$input['score'];
        $examtakers->exam_date = @$input['exam_date'];

        return $examtakers->save();
    }

    public function update($id, $input)
    {
        $examtakers = Examtakers::find($id);

        $examtakers->user_id = @$input['user_id'];
        $examtakers->exam_id = @$input['exam_id'];
        $examtakers->score = @$input['score'];
        $examtakers->exam_date = @$input['exam_date'];

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

                if($searchData->has('user_id') && $searchData->get('user_id') !== null)
                {
                    $qry->whereRaw('LOWER(user_id) like ?', array('%'.mb_strtolower($searchData->get('user_id')).'%'));
                }

            })
            ->addColumn('action', function ($examtakers) {
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