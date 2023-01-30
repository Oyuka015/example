<?php

namespace App\Repositories\Faq;


use App\Repositories\Faq\FaqInterface as FaqInterface;
use App\Models\Faq;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class FaqRepository implements FaqInterface
{
    public function all()
    {
        return Faq::all();
    }

    public function find($id)
    {
        return Faq::find($id);
    }

    public function create($input)
    {
        $faq = new Faq;
        $faq->question = @$input['question'];
        $faq->answer = @$input['answer'];

        return $faq->save();
    }

    public function update($id, $input)
    {
        $faq = Faq::find($id);

        $faq->question = @$input['question'];
        $faq->answer = @$input['answer'];

        return $faq->save();
    }

    public function delete($id)
    {
        $faq = Faq::find($id);
        return $faq->delete();
    }

    public function getDatatableList($searchData)
    {

        $faq = Faq::select('*');
        $qry = $faq;
        
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
            ->addColumn('action', function ($place) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary faq-edit" style="margin:3px" data-faqid="'.@$faq->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger faq-delete" style="margin:3px" data-faqid="'.@$faq->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}