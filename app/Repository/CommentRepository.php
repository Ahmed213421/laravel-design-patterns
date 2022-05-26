<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentRepositoryInterface{
    
    public function getComment(Request $request){
        $validate = $request->validate([
            'description' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->description = $request->description;
        $comment->save();

        return redirect()->back();
    }

}