<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface TagRepositoryInterface{
    public function getAllTags(Request $request);

    public function storeTag(Request $request);

    public function showTag($id);

    public function deleteTag($id);
}