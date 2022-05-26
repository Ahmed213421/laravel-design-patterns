<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface CommentRepositoryInterface{

    public function getComment(Request $request);
}