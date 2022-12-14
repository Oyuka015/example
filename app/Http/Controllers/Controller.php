<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        return view('faq');;
    }
    public function feedback(){
        return view('feedback');;
    }
    public function login(){
        return view('login');;
    }
}

