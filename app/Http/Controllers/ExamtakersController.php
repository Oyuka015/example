<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Examtakers;
use App\Models\Exam;
use App\Models\User;

use App\Repositories\Examtakers\ExamtakersInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Exceptions\InvalidOrderException;

use \DB;
use Storage;
use \Validator as Validator;
use \View as View;

class ExamtakersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(ExamtakersInterface $examtakers) {
        $this->examtakers = $examtakers;
        $this->view_path = 'admin.exam.practice';
    }

    public function index(Request $request)
    {
        return view($this->view_path.'.index');
    }

    public function create()
    {
        $exams = Exam::count();
        $customers = User::where('license_active', '!=', true)->where('is_active', true)->withCount('passedExams')->get()->where('passed_exams_count', $exams);
        // dd(User::where('license_active', '!=', true)->where('is_active', true)->withCount('passedExams')->get()->where('passed_exams_count', $exams));
        $data['customers'] = $customers;
        return view($this->view_path.'.add', $data);
    }

    public function edit($id)
    {
        $examtakers = $this->examtakers->find($id);

        $data['examtakers'] = $examtakers;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->input(), Examtakers::$rules);
        // process the save
        if ($validator->fails()) 
        {
            $response = array(
                'status' => 'error',
                'msg' => trans('messages.error_save'),
                'errors' => $validator->errors()
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        } 
        else 
        {
            $app = $this->examtakers->create($request->input());
            $response = array(
                'status' => 'success',
                'msg' => trans('messages.success_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
    }

    public function update($id, Request $request)
    {
        
        $validator = Validator::make($request->input(), Examtakers::$rules);
        // process the save
        if ($validator->fails()) 
        {
            $response = array(
                'status' => 'error',
                'msg' => trans('messages.error_save'),
                'errors' => $validator->errors()
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        } 
        else 
        {
            $app = $this->examtakers->update($id, $request->input());
            $response = array(
                'status' => 'success',
                'msg' => trans('messages.success_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
    }

    public function dataTableList(Request $request)
    {
        return $this->examtakers->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->examtakers->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }
}
