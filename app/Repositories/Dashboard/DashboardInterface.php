<?php

namespace App\Repositories\Dashboard;


interface DashboardInterface  {

    public function find($id);


    public function delete($id);
}