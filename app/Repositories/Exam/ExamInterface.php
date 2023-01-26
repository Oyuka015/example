<?php

namespace App\Repositories\Exam;


interface ExamInterface  {

    public function find($id);


    public function delete($id);
}