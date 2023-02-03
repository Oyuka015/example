<?php

namespace App\Repositories\Users;


interface UsersInterface  {

    public function find($id);


    public function delete($id);
}