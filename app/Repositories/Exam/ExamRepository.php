<?php

namespace App\Repositories\Exam;


use App\Repositories\Exam\ExamInterface as ExamInterface;
use App\Models\Exam;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class ExamRepository implements ExamInterface
{
    public function find($id)
    {
        return Exam::find($id);
    }

    public function create($input)
    {
        $exam = new Exam;
        $exam->exam_name = @$input['exam_name'];
        $exam->exam_file = @$input['exam_file'];

        return $exam->save();
    }

    public function update($id, $input)
    {
        $exam = Exam::find($id);

        $exam->exam_name = @$input['exam_name'];
        $exam->exam_file = @$input['exam_file'];

        return $exam->save();
    }

    public function delete($id)
    {
        $exam = Exam::find($id);
        return $exam->delete();
    }

    public function getDatatableList($searchData)
    {

        $exam = Exam::select('*');
        $qry = $exam;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('exam_name') && $searchData->get('exam_name') !== null)
                {
                    $qry->whereRaw('LOWER(exam_name) like ?', array('%'.mb_strtolower($searchData->get('exam_name')).'%'));
                }
            })
            ->addColumn('action', function ($exam) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary exam-edit" style="margin:3px" data-examid="'.@$exam->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger exam-delete" style="margin:3px" data-examid="'.@$exam->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}