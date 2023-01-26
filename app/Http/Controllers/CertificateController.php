<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Certificate;

use App\Repositories\Certificate\CertificateInterface;

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

class CertificateController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $view_path;

    public function __construct(CertificateInterface $certificate) {
        $this->certificate = $certificate;
        $this->view_path = 'admin.certificate';
    }

    public function index(Request $request)
    {
        return view($this->view_path.'.index');
    }

    public function create()
    {
        return view($this->view_path.'.add');
    }

    public function edit($id)
    {
        $certificate = $this->certificate->find($id);

        $data['certificate'] = $certificate;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->input(), Certificate::$rules);
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
            $app = $this->certificate->create($request->input());
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
        
        $validator = Validator::make($request->input(), Certificate::$rules);
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
            $app = $this->certificate->update($id, $request->input());
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
        return $this->certificate->getDatatableList($request);
    }

    public function destroy($id)
    {
        $app = $this->certificate->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }
}
