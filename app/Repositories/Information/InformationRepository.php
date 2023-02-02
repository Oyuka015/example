<?php

namespace App\Repositories\Information;


use App\Repositories\Information\InformationInterface as InformationInterface;
use App\Models\Information;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class InformationRepository implements InformationInterface
{
    public function all()
    {
        return Information::all();
    }
    public function find($id)
    {
        return Information::find($id);
    }

    public function create($input)
    {
        $information = new Information;
        $information->image = @$input['image'];
        $information->title = @$input['title'];
        $information->information = @$input['information'];

        return $information->save();
    }

    public function update($id, $input)
    {
        $information = Information::find($id);

        $information->image = @$input['image'];
        $information->title = @$input['title'];
        $information->information = @$input['information'];

        return $information->save();
    }

    public function delete($id)
    {
        $information = Information::find($id);
        return $information->delete();
    }

    public function getDatatableList($searchData)
    {

        $information = Information::select('*');
        $qry = $information;
        
        $data = Datatables::make($qry) 
            ->filter(function ($qry) use ($searchData) {

                if($searchData->has('title') && $searchData->get('title') !== null)
                {
                    $qry->whereRaw('LOWER(title) like ?', array('%'.mb_strtolower($searchData->get('title')).'%'));
                }
            })
            ->addColumn('action', function ($information) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary information-edit" style="margin:3px" data-informationid="'.@$information->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger information-delete" style="margin:3px" data-informationid="'.@$information->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}