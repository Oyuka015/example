<?php

namespace App\Repositories\Exam;


use App\Repositories\Exam\ExamInterface as ExamInterface;
use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamResult;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Config;
use Auth;
use \Carbon\Carbon;
class ExamRepository implements ExamInterface
{
    public function find($id)
    {
        return Exam::find($id);
    }

    public function create($input)
    {
        $exam = new Exam;
        $exam->name = @$input['exam_name'];
        $exam->description = @$input['description'];
        $exam->exam_time = @$input['exam_time'];
        $exam->lower_percent = @$input['lower_percent'];
        $exam->is_active = @$input['is_active'] ? true : false;
        $exam->save();

        $exam->questions()->attach(@$input['questions']);

        return $exam;
    }

    public function update($id, $input)
    {
        $exam = Exam::find($id);

        $exam->name = @$input['name'];
        $exam->lower_percent = @$input['lower_percent'];
        $exam->exam_time = @$input['exam_time'];
        $exam->description = @$input['description'];

        return $exam;
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
            ->addColumn('required_exam', function ($exam) {
                return @$exam->requiredExam ? $exam->requiredExam->name : '';
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

    public function examResult($input)
    {
        $user = Auth::user();
        $scores = 0;

        foreach($input['question'] as $key => $answer)
        {
            $question = Question::find($key);
            $point = $question->correct_answer == $answer ? $question->score : 0;
            @$array['exam_id'] = $input['exam_id'];
            @$array['question_id'] = $key;
            @$array['answer'] = $answer;
            @$array['score'] = $point;
            $user->examQuestions()->attach([@$array]);
            $scores = $scores + $point;
        }

        $exam = Exam::find($input['exam_id']);
        $is_passed = $exam->lower_percent <= (100*$scores)/$exam->questions->sum('score') ? true : false;
        @$arrayExam['exam_id'] = $input['exam_id'];
        @$arrayExam['is_passed'] = $is_passed;
        @$arrayExam['exam_date'] = Carbon::now()->toDateTimeString();
        @$arrayExam['score'] = $scores;
        $user->exams()->attach([@$arrayExam]);

        return $exam;
    }
}