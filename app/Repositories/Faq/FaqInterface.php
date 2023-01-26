<?php

namespace App\Repositories\Faq;


interface FaqInterface  {

    public function find($id);


    public function delete($id);
}