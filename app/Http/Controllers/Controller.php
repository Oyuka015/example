<?php

namespace App\Http\Controllers;
use App\Repositories\Faq\FaqInterface;
use App\Repositories\Information\InformationInterface;
use App\Repositories\Online\OnlineInterface;
use App\Repositories\Certificate\CertificateInterface;
use App\Models\Information;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \View as View;
use Illuminate\Http\Request;

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
        $informations = $this->information->all();

        $data['informations'] = $informations;
        
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

        $data['onlines'] = $onlines;
        
        return View::make('online.online', $data);
    }
    public function course(){
        $onlines = $this->online->all();

        $data['onlines'] = $onlines;
        
        return View::make('online/course', $data);
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
        
        // dD( $id);
        $getData = Information::where('id', $id)->get();
        // dd($getData[0]->title);
        $data['info'] = $getData;
        return View::make('information.detailinfo', $data);
    }

}

