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
            $online->lesson_group_id = @$finded['id'];
        }
        else{
            $codelists = new Codelists;

            $codelists->name = @$input['add_lesson_group'];
            $codelists->parent_id = Config::get('codelists.codelist')['lesson_group_parent_id'];
            $codelists->save();
            

            $online->lesson_group_id = @$codelists['id'];
        }

        if ($file['file0'])
        {
            $path = $file['file0']->store('videos', ['disk' => 'my_files']);
            $online->video = $path;
        }
        // if ($file['file0'])
        // {
        //     $receiver = new FileReceiver('file0', $request, HandlerFactory::classFromRequest($request));
        //     dD($receiver);
        //     if (!$receiver->isUploaded()) {
        //         // file not uploaded
        //     }
        
        //     $fileReceived = $receiver->receive(); // receive file
        //     if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
        //         $file = $fileReceived->getFile(); // get file
        //         $extension = $file->getClientOriginalExtension();
        //         $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
        //         $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
        
        //         $disk = Storage::disk(config('filesystems.default'));
        //         $path = $disk->putFileAs('videos', $file, $fileName);
        
        //         // delete chunked file
        //         unlink($file->getPathname());
        //         return [
        //             'path' => asset('storage/' . $path),
        //             'filename' => $fileName
        //         ];
        //     }
        
        //     // otherwise return percentage information
        //     $handler = $fileReceived->handler();
        //     return [
        //         'done' => $handler->getPercentageDone(),
        //         'status' => true
        //     ];
        // }

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

            ->editColumn('created_by', function ($online) {
                return $online->user->firstname;
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