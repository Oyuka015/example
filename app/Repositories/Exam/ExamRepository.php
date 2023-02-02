<?php

namespace App\Repositories\Exam;


use App\Repositories\Exam\ExamInterface as ExamInterface;
use App\Models\Exam;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Config;

class ExamRepository implements ExamInterface
{
    public function find($id)
    {
        return Exam::find($id);
    }

    public function create($input)
    {
        $exam = new Exam;
        $exam->name = @$input['name'];
        $exam->lower_percent = @$input['lower_percent'];
<<<<<<< Updated upstream
        $exam->is_active = @$input['is_active'] ? true : false;
=======
>>>>>>> Stashed changes

        $exam->save();

        $exam->questions()->attach(@$input['questions']);

        return $exam;
    }

    public function update($id, $input)
    {
        $exam = Exam::find($id);

        $exam->name = @$input['name'];
        $exam->lower_percent = @$input['lower_percent'];

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

                if($searchData->has('name') && $searchData->get('name') !== null)
                {
                    $qry->whereRaw('LOWER(name) like ?', array('%'.mb_strtolower($searchData->get('name')).'%'));
                }
            })
            ->editColumn('is_active', function ($exam) {
                return Config::get('base.is_active')[$exam->is_active];
            })
            ->addColumn('question_count', function ($exam) {
                return $exam->questions()->count();
            })
            ->addColumn('question_score', function ($exam) {
                return $exam->questions()->sum('score');
            })
            ->addColumn('action', function ($exam) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary exam-edit" style="margin:3px" data-examid="'.@$exam->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                if($exam->users->count() == 0)
                {
                    $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger exam-delete" style="margin:3px" data-examid="'.@$exam->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                }
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}