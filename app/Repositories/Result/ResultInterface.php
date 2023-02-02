<?php

namespace App\Repositories\Result;


interface ResultInterface  {

    public function find($id);


    public function delete($id);
}