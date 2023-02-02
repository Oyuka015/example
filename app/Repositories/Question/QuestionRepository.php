<?php

namespace App\Repositories\Question;


use App\Repositories\Question\QuestionInterface as QuestionInterface;
use App\Models\Question;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class QuestionRepository implements QuestionInterface
{
    public function all()
    {
        return Question::all();
    }

    public function find($id)
    {
        return Question::find($id);
    }

    public function create($input)
    {
        $question = new Question;
        $question->question = @$input['question'];
        $question->answer1 = @$input['answer1'];
        $question->answer2 = @$input['answer2'];
        $question->answer3 = @$input['answer3'];
        $question->answer4 = @$input['answer4'];
        $question->correct_answer = @$input['correct_answer'];
        $question->score = @$input['score'];

        return $question->save();
    }

    public function update($id, $input)
    {
        $question = Question::find($id);

        $question->question = @$input['question'];
        $question->answer1 = @$input['answer1'];
        $question->answer2 = @$input['answer2'];
        $question->answer3 = @$input['answer3'];
        $question->answer4 = @$input['answer4'];
        $question->correct_answer = @$input['correct_answer'];
        $question->score = @$input['score'];

        return $question->save();
    }

    public function delete($id)
    {
        $question = Question::find($id);
        return $question->delete();
    }

    public function getDatatableList($searchData)
    {

        $question = Question::select('*');
        $qry = $question;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                // if($searchData->has('question') && $searchData->get('question') !== null)
                // {
                //     $qry->whereRaw('LOWER(question) like ?', array('%'.mb_strtolower($searchData->get('question')).'%'));
                // }
                if($searchData->has('question') && $searchData->get('question') !== null)
                {
                    $qry->where('question', $searchData->get('question'));
                }
            })
            ->addColumn('action', function ($question) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary question-edit" style="margin:3px" data-questionid="'.@$question->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger question-delete" style="margin:3px" data-questionid="'.@$question->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}