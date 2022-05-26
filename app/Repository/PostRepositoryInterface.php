<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface PostRepositoryInterface{

    public function getAllPosts();

    public function createPost();

    public function storePost(Request $request);

    public function editPost($id);

    public function showPost($id);

    public function updatePost(Request $request,$id);

    public function deletePost($id);
}