<?php

namespace App\Repositories\Feedback;


use App\Repositories\Feedback\FeedbackInterface as FeedbackInterface;
use App\Models\Feedback;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class FeedbackRepository implements FeedbackInterface
{
    public function find($id)
    {
        return Feedback::find($id);
    }

    public function create($input)
    {
        $feedback = new Feedback;
        $feedback->user_name = @$input['user_name'];
        $feedback->feedback = @$input['feedback'];

        return $feedback->save();
    }

    public function update($id, $input)
    {
        $feedback = Feedback::find($id);

        $feedback->user_name = @$input['user_name'];
        $feedback->feedback = @$input['feedback'];

        return $feedback->save();
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id);
        return $feedback->delete();
    }

    public function getDatatableList($searchData)
    {

        $feedback = Feedback::select('*');
        $qry = $feedback;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('feedback') && $searchData->get('feedback') !== null)
                {
                    $qry->whereRaw('LOWER(feedback) like ?', array('%'.mb_strtolower($searchData->get('feedback')).'%'));
                }
            })
            ->addColumn('action', function ($place) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary feedback-edit" style="margin:3px" data-feedbackid="'.@$feedback->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger feedback-delete" style="margin:3px" data-feedbackid="'.@$feedback->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}