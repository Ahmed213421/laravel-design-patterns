<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface{
    public function getAllPosts()
    {
       return Post::paginate(2);
    }

    public function createPost(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.pages.posts.create',compact('categories','tags'));
    }

    public function storePost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index');

    }

    public function showPost($id){
        $comments = Comment::where('post_id',$id)->get();
        $post = Post::where('id',$id)->first();
        return view('admin.pages.posts.show',compact('comments','post'));
    }

    public function editPost($id){
        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.pages.posts.edit',compact('post','tags'));
    }

    public function updatePost(Request $request,$id){
        $post = Post::find($id);
        $post->name = $request->name;
        $post->title = $request->title;
        $post->save();
        $post->tags()->sync($request->tag_id);

        return redirect()->route('posts.index');
    }

    public function deletePost($id){
        Post::find($id)->delete();
        return back();
    }


}