<?php

namespace App\Repositories\Information;


interface InformationInterface  {

    public function find($id);


    public function delete($id);
}