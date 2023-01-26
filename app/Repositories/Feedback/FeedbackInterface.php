<?php

namespace App\Repositories\Feedback;


interface FeedbackInterface  {

    public function find($id);


    public function delete($id);
}