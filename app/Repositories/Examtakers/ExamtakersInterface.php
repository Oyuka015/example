<?php

namespace App\Repositories\Examtakers;


interface ExamtakersInterface  {

    public function find($id);


    public function delete($id);
}