<?php

namespace App\Repositories\Question;


interface QuestionInterface  {

    public function find($id);


    public function delete($id);
}