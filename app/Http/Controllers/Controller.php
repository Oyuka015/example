<?php

namespace App\Http\Controllers;
use App\Repositories\Faq\FaqInterface;
use App\Repositories\Information\InformationInterface;
use App\Repositories\Online\OnlineInterface;
use App\Repositories\Certificate\CertificateInterface;
use App\Models\Information;
use App\Models\Codelists;
use App\Models\Online;
use App\Models\Aulevels;
use App\Models\Certificate;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \View as View;
use Illuminate\Http\Request;
use Session;
use \Config;
use \PDF;
use \QrCode;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(FaqInterface $faq, InformationInterface $information, OnlineInterface $online, CertificateInterface $certificate) {
        $this->faq = $faq;
        $this->information = $information;
        $this->online = $online;
        $this->certificate = $certificate;
    }

    public function aa()
    {
        
        $informations = Information::select('*')->limit(3)->get();
        $lessonCount = \DB::select('select count(*) from base.online_course')[0]->count;
        if(\Auth::user()){
            $userLessonCount = \Auth::user()->userToLesson()->count();
            $data['userLessonCount'] = $userLessonCount;
        }
        // dd($lessonCount, $userLessonCount);
        $data['informations'] = $informations;
        $user_Data = Session::get('login_user');
        $data['userData'] = $user_Data;
        $data['lessonCount'] = $lessonCount;
        
        return View::make('test', $data);

    }

    public function medeelel()
    {
        $informations = $this->information->all();

        $data['informations'] = $informations;
        
        return View::make('information/medeelel', $data);
    }

    public function detailinfo()
    {
        $informations = $this->information->all();

        $data['informations'] = $informations;
        
        return View::make('information/detailinfo', $data);
    }

    public function exam(){
        
        return view('exam.exam');;
    }

    public function online(){
        $onlines = $this->online->all();

        $groups = Codelists::where('parent_id', Config::get('codelists.codelist')['lesson_group_parent_id'])->get();
        // dd($groups->first()->lessonGroup);
        $data['onlines'] = $onlines;
        $data['groups'] = $groups;
        
        return View::make('online.online', $data);
    }

    public function course(){
        $onlines = $this->online->all();

        $data['onlines'] = $onlines;
        
        return View::make('online.course', $data);
    }

    public function lesson(){
        $onlines = $this->online->all();

        $data['onlines'] = $onlines;
        
        return View::make('online/lesson', $data);
    }

    public function certi(){

        $certificates = $this->certificate->all();

        $data['certificates'] = $certificates;
        
        return View::make('certi', $data);
    }

    public function faq(){
        $faqs = $this->faq->all();

        $data['faqs'] = $faqs;
        
        return View::make('faq', $data);
    }

    public function feedback(){
        return view('feedback');;
    }

    public function login(){
        return view('login');;
    }
    
    public function getDataForInformation($id){
        // dd($id);
        $getData = Information::where('id', $id)->get();
        // dd($getData[0]->title);
        $data['info'] = $getData;
        return View::make('information.detailinfo', $data);
    }

    public function getDatasForLesson($id){
        // dd($id);
        $getData = Online::where('id', $id)->get();
        // dd($getData[0]->title);
        $data['lesson'] = $getData;
        return View::make('online.course', $data);
    }

    public function getAuLevel2($id){
        $au_level2 = Aulevels::where('parent_id', $id)->get();
        $data['au_level2'] = $au_level2;

        return View::make('sub_blades.level2', $data);
    }

    public function steamCertificate($id)
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

        QrCode::generate('/certificate/download/public/'.$id, public_path('images/qrcode_'.$id.'.png'));
        $pdf = PDF::loadView('pdfview', $data)->setPaper('a4', 'landscape');
        // return View::make('qrcode', $data);
        return $pdf->stream();
    }
    public function searchCertificate(request $request){

        $input = $request->input();
        $inputValueType = gettype($input['value']);
        $result = Certificate::where('certificate_id', $input['value'])->orWhere('register','ilike',  strtolower($input['value']))->get();
        if(@$result[0]){
            $data = [
                'certificate_no' => @$result[0]->certificate_id,
                'lastname' => @$result[0]->user ? @$result[0]->user->lastname : '',
                'firstname' => @$result[0]->user ? @$result[0]->user->firstname : '',
                'year' => @$result[0]->created_at->year,
                'month' => @$result[0]->created_at->month,
                'day' => @$result[0]->created_at->day,
                'image_url' => asset('images/qrcode_'.$result[0]->user_id.'.png')
            ];
            
            QrCode::generate('/certificate/download/public/'.$result[0]->user_id, public_path('images/qrcode_'.$result[0]->user_id.'.png'));
            $pdf = PDF::loadView('pdfview', $data)->setPaper('a4', 'landscape');
            // dd('ss');
            // return View::make('qrcode', $data);
            return $pdf->stream();
        }
        else{
            return  View::make('sub_blades.error');
        }
        // dd($result[0]->user_id);
       
    }
}

