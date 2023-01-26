<?php

namespace App\Repositories\Systemuser;


interface SystemuserInterface  {

    public function find($id);


    public function delete($id);
}