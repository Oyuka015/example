<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Certificate;
use App\Models\User;
use App\Models\Exam;

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
use PDF;
use QrCode;

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
        $exams = Exam::count();
        $customers = User::where('license_active', '!=', true)->where('is_active', true)->withCount('passedExams')->get()->where('passed_exams_count', $exams);

        $data['customers'] = $customers;

        return view($this->view_path.'.add', $data);
    }

    public function edit($id)
    {
        $certificate = $this->certificate->find($id);

        $data['certificate'] = $certificate;

        return View::make($this->view_path.'.edit', $data);
    }

    public function store(Request $request)
    {
        if($request->input() == []){
            $response = array(
                'status' => 'error',
                'msg' => trans('messages.error_save'),
            );

            $data['response'] = $response;

            return View::make('core.alert.messages', $data);
        }
        else{
            foreach($request->input() as $id){
                $store = $this->certificate->create($id);
            }
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

    public function dataTableListPublic(Request $request)
    {
        return $this->certificate->getDatatableListPublic($request);
    }

    public function destroy($id)
    {
        // dd($id);
        $app = $this->certificate->delete($id);
        $response = array(
            'status' => 'success',
            'msg' => trans('messages.success_delete'),
        );

        $data['response'] = $response;

        return View::make('core.alert.messages', $data);
    }

    public function donwloadCertificate($id)
    {
        $cert = $this->certificate->find($id);

        $data = [
            'certificate_no' => @$cert->certificate_id,
            'lastname' => @$cert->user ? @$cert->user->lastname : '',
            'firstname' => @$cert->user ? @$cert->user->firstname : '',
            'year' => @$cert->created_at->year,
            'month' => @$cert->created_at->month,
            'day' => @$cert->created_at->day,
            'image_url' => asset('images/qrcode_'.$id.'.png')
        ];

        QrCode::generate('certificate/download/public/'.$id, public_path('images/qrcode_'.$id.'.png'));
        $pdf = PDF::loadView('pdfview', $data)->setPaper('a4', 'landscape');
        // return View::make('qrcode', $data);
        return $pdf->download();
    }
}
