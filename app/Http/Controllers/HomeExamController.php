<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Exam;
use App\Models\Question;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

use App\Repositories\Exam\ExamInterface;

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

class HomeExamController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(ExamInterface $exam) {
        $this->exam = $exam;
        $this->view_path = 'exam';
    }

    public function index(Request $request)
    {
        $exam = Exam::select('*')->orderBy('id')->get();
        // dD($exam);
        $data['exam'] = $exam;

        return view($this->view_path.'.index', $data);
    }

    public function examDetail($id)
    {
        $exams = Exam::find($id);
        // $questions = Question::where('is_active', true)->get();
        // foreach($exams->examToMap as $exam){
        //     dd($exam->mapToQuestions);
        // }
        // dd($exams->examToMap->mapToQuestions);
        $data['questions'] = $exams->examToMap;
        $data['exams'] = $exams;
        // $data['questions'] = $questions;
        return view($this->view_path.'.detail', $data);
    }

    public function edit($id)
    {
        $exam = $this->exam->find($id);
        $questions = Question::where('is_active', true)->get();
        $exams = Exam::where('id', '!=', $id)->get();

        $data['exams'] = $exams;
        $data['questions'] = $questions;
        $data['exam'] = $exam;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->input(), Exam::$rules);
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
            $app = $this->exam->create($request->input());
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
        
        $validator = Validator::make($request->input(), Exam::$rules);
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
            $app = $this->exam->update($id, $request->input());
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
        return $this->exam->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->exam->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }
}
