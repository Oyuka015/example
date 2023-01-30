<?php

namespace App\Http\Controllers;
use App\Repositories\Faq\FaqInterface;
use App\Repositories\Information\InformationInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \View as View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(FaqInterface $faq) {
        $this->faq = $faq;
    }
    

    public function aa()
    {
        return view('test');;
    }

    public function medeelel()
    {
        return view('medeelel');;
    }
    public function exam(){
        return view('exam');;
    }
    public function online(){
        return view('online');;
    }
    public function certi(){
        return view('certi');;
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
}

