<?php

namespace App\Repositories\Dashboard;


use App\Repositories\Dashboard\DashboardInterface as DashboardInterface;
use App\Models\Dashboard;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class DashboardRepository implements DashboardInterface
{
    public function all()
    {
        return Dashboard::all();
    }

    public function find($id)
    {
        return Dashboard::find($id);
    }

    public function create($input)
    {
        $dashboard = new Dashboard;
        // $dashboard->question = @$input['question'];
        // $dashboard->answer = @$input['answer'];

        return $dashboard->save();
    }

    public function update($id, $input)
    {
        $dashboard = Dashboard::find($id);

        // $dashboard->question = @$input['question'];
        // $dashboard->answer = @$input['answer'];

        return $dashboard->save();
    }

    public function delete($id)
    {
        $dashboard = Dashboard::find($id);
        return $dashboard->delete();
    }

    public function getDatatableList($searchData)
    {

        $dashboard = Dashboard::select('*');
        $qry = $dashboard;
        
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
            ->addColumn('action', function ($dashboard) {
                $actionHtml = "";
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-primary dashboard-edit" style="margin:3px" data-dashboardid="'.@$dashboard->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.edit\')}}"><i class="fa fa-pencil"></i></a>';
                $actionHtml .= '<a href="javascript:;" class="btn btn-circle btn-danger dashboard-delete" style="margin:3px" data-dashboardid="'.@$dashboard->id.'" data-toggle="tooltip" data-placement="top" data-original-title="{{trans(\'display.delete\')}}"><i class="fa fa-times"></i></a>';
                return $actionHtml;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $data;
    }
}