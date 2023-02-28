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
use PDF;
use QrCode;

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

        $data['informations'] = $informations;
        $user_Data = Session::get('login_user');
        $data['userData'] = $user_Data;
        
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

    public function pdf()
    {
        $data = [
            'certificate_no' => '2023-3(001)',
            'lastname' => 'Оооооооооооооовоог',
            'firstname' => 'Нээээр-нэээр',
            'year' => 'Нээээр-нэээр',
            'month' => 'Нээээр-нэээр',
            'day' => 'Нээээр-нэээр',
            'image_url' => asset('images/user_id.svg')
        ];

        QrCode::generate('Welcome to Makitweb', public_path('images/user_id.svg') );
        $pdf = PDF::loadView('pdfview', $data)->setPaper('a4', 'landscape');
        // return View::make('qrcode', $data);
        return $pdf->stream();
    }
}

