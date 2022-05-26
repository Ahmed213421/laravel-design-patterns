<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface{
    public function getAllCategories()
    {
       return Category::all();
    }

    public function createCategory(){
        return view('admin.pages.categories.create');
    }

    public function storeCategories(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');

    }

    public function showcategories($id){
        $category = Category::find($id)->first();
        $posts = Post::where('category_id',$id)->get();
        return view('admin.pages.categories.show',compact('category','posts'));
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.pages.categories.edit',compact('category'));
    }


    public function updateCategory(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        
        return redirect()->route('categories.index');
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        return back();
    }

}