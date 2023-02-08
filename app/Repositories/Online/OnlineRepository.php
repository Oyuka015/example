<?php

namespace App\Repositories\Online;


use App\Repositories\Online\OnlineInterface as OnlineInterface;
use App\Models\Online;
use App\Models\Codelists;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use ConfigHelper;
use DB;
use Auth;
use File;

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
        $online->created_by = Auth::User()->id;
        // dD($online);
        if($input['selected_lesson_group'] != null){

            $finded = Codelists::where('id', $input['selected_lesson_group'])->get();
            $online->lesson_group_id = @$finded[0]->id;
        }
        if(@$input['add_lesson_group'] != null){           
            $codelists = new Codelists;

            $codelists->name = @$input['add_lesson_group'];
            $codelists->parent_id = Config::get('codelists.codelist')['lesson_group_parent_id'];
            $codelists->created_by = Auth::User()->id;
            $codelists->save();
            
            $online->lesson_group_id = @$codelists['id'];
        }

        if ($file['file0'])
        {
            $path = $file['file0']->store('videos', ['disk' => 'my_files']);
            $online->video = $path;
        }
        if ($file['pdf0'])
        {
            $path = $file['pdf0']->store('pdf_files', ['disk' => 'my_files']);
            $online->pdf_file = $path;
        }

        $online->save();
        return $online;
    }

    public function update($id, $input, $file)
    {
        $online = Online::find($id);
        // dd($input, $file);
        if($file){
            if(@$file['file0']){
                File::delete(public_path($online->video));
                $path = $file['file0']->store('videos', ['disk' => 'my_files']);
                $online->video = $path;
            }
            if(@$file['pdf0']){
                File::delete(public_path($online->pdf_file));
                $path = $file['pdf0']->store('pdf_files', ['disk' => 'my_files']);
                $online->pdf_file = $path;
            }
        }
        $online->lesson_name = @$input['lesson_name'];
        $online->lesson_summary = @$input['lesson_summary'];
        if(@$input['selected_lesson_group_edit'] != null){

            $finded = Codelists::where('id', $input['selected_lesson_group_edit'])->get();
            $online->lesson_group_id = @$finded[0]->id;
            // dd($online->lesson_group_id);
        }
        if(@$input['add_lesson_group_edit'] != null){
            $codelists = new Codelists;

            $codelists->name = @$input['add_lesson_group_edit'];
            $codelists->parent_id = Config::get('codelists.codelist')['lesson_group_parent_id'];
            $codelists->save();

            $online->lesson_group_id = @$codelists['id'];
        }
        
        return $online->save();
    }

    public function delete($id)
    {
        $online = Online::find($id);
        File::delete(public_path($online->pdf_file));
        File::delete(public_path($online->video));
        return $online->delete();
    }
    public function deleteGroup($id)
    {
        $online = Codelists::find($id);
        return $online->delete();
    }

    public function getDatatableList($searchData)
    {

        $online = Codelists::where('id', $input['selected_lesson_group'])->get();
        $qry = $online;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('lesson_name') && $searchData->get('lesson_name') !== null)
                {
                    $qry->whereRaw('LOWER(lesson_name) like ?', array('%'.mb_strtolower($searchData->get('lesson_name')).'%'));
                }
            })

            ->editColumn('created_by', function ($online) {
                return @$online->user->firstname;
            })
            ->editColumn('created_at', function ($online) {
                return date('Y-m-d H:i:s', strtotime($online->created_at));
            })
            ->editColumn('lesson_group_id', function ($online) {
                // dd($online->group->name);
                return @$online->group->name;
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
    public function getGroupDatatableList($searchData)
    {
        $online = Codelists::where('parent_id', Config::get('codelists.codelist')['lesson_group_parent_id']);
        $qry = $online;
        
        $data = Datatables::make($qry) 
            ->editColumn('created_by', function ($online) {
                return @$online->user->firstname;
            })
            ->editColumn('created_at', function ($online) {
                return date('Y-m-d H:i:s', strtotime($online->created_at));
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