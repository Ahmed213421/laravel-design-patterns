<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface{

    // get all cateogries
    public function getAllCategories();
    
    
    // store cateogries
    public function storeCategories(Request $request);
    
    public function showcategories($id);
    
    public function createCategory();
    
    public function editCategory($id);
    
    public function updateCategory(Request $request,$id);

    public function deleteCategory($id);
}