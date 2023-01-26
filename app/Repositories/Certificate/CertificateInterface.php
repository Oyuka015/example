<?php

namespace App\Repositories\Certificate;


interface CertificateInterface  {

    public function find($id);


    public function delete($id);
}