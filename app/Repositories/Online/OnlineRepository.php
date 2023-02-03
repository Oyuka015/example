<?php

namespace App\Repositories\Online;


use App\Repositories\Online\OnlineInterface as OnlineInterface;
use App\Models\Online;
use App\Models\Codelists;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use ConfigHelper;
use DB;

use Config;

class OnlineRepository implements OnlineInterface
{
    public function all()
    {
        return Online::all();
    }
    public function find($id)
    {
        return Online::find($id);
    }

    public function create($input, $file)
    {
        $online = new Online;

        $online->lesson_name = @$input['lesson_name'];
        $online->lesson_summary = @$input['lesson_summary'];
        $online->lesson_posted = @$input['lesson_posted'];
        $online->lesson_type = @$input['lesson_type'];

        if($input['selected_lesson_group'] != null){

            $finded = Codelists::where('id', $input['selected_lesson_group'])->get();
            $online->lesson_group_id = @$finded['id'];
        }
        else{
            $codelists = new Codelists;

            $codelists->name = @$input['lesson_name'];
            $codelists->parent_id = Config::get('codelists.codelist')['lesson_group_parent_id'];
            $codelists->save();
            dd($codelists['id'], 'yu bn');

            $online->lesson_group_id = @$codelists['id'];
        }

        if ($file['file0'])
        {
            $path = $file['file0']->store('videos', ['disk' => 'my_files']);
            $online->video = $path;
        }
        $online->save();
        return $online;
    }

    public function update($id, $input)
    {
        $online = Online::find($id);

        $online->lesson_name = @$input['lesson_name'];
        $online->lesson_summary = @$input['lesson_summary'];
        $online->lesson_posted = @$input['lesson_posted'];
        $online->posted_date = @$input['posted_date'];
        $online->lesson_type = @$input['lesson_type'];
        
        return $online->save();
    }

    public function delete($id)
    {
        $online = Online::find($id);
        return $online->delete();
    }

    public function getDatatableList($searchData)
    {

        $online = Online::select('*');
        $qry = $online;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('lesson_name') && $searchData->get('lesson_name') !== null)
                {
                    $qry->whereRaw('LOWER(lesson_name) like ?', array('%'.mb_strtolower($searchData->get('lesson_name')).'%'));
                }
            })
            ->addColumn('action', function ($online) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary online-edit" style="margin:3px" data-onlineid="'.@$online->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger online-delete" style="margin:3px" data-onlineid="'.@$online->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}