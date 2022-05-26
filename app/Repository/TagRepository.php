<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagRepository implements TagRepositoryInterface{
    public function getAllTags(Request $request)
    {
       $tags = Tag::all();
       $search = $request->search;
        $tagss = Tag::query()->where('name','LIKE','%'.$search.'%')->get();
       return view('admin.pages.tags.index',compact('tags','tagss'));
    }

    public function storeTag(Request $request){
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return back();
    }

    public function showTag($id){
        $tag = Tag::find($id);
        $posts = Post::get();
        return view('admin.pages.tags.show',compact('tag','posts'));
    }

   public function deleteTag($id){
       Tag::find($id)->delete();
       return back();
   }
}