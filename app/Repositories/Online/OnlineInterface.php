<?php

namespace App\Repositories\Online;


interface OnlineInterface  {

    public function find($id);


    public function delete($id);
}