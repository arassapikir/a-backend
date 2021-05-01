<?php

namespace App\Http\Controllers\Web;

use App\Helpers\File;
use App\Helpers\Input;
use App\Helpers\Variable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $parent = null;
        $categories = Category::query()->latest();
        if (request()->has('category')){
            $parent = Category::findOrFail(request()->get('category'));
            $categories->where('parent_id', $parent->id);
        }
        else{
            $categories->whereNull('parent_id');
        }
        $categories = $categories->get();
        return view("products.categories.index", compact("categories", 'parent'));
    }

    public function store(CategoryRequest $request){
        $image_type = $request->has('parent_id') ? 'subcategory' : 'category';
        Category::create([
            'project_id' => Variable::projectId(),
            'parent_id' => $request->get('parent_id'),
            'title' => Input::getText($request->all(), 'title'),
            'image' => File::storeImage($request->file('image'), $request->get('title_tk'), 'categories', $image_type),
        ]);
    }

    public function update(CategoryRequest $request, Category $category){
        $image_type = $category->parent_id ? 'subcategory' : 'category';
        $category->update([
            'title' => Input::getText($request->all(), 'title'),
            'image' => $request->has('image') ? File::storeImage($request->file('image'), $request->get('title_tk'), 'categories', $image_type) : $category->image
        ]);
        return $this->updated();
    }

    public function destroy(Category $category){
        $category->delete();
        return $this->deleted();
    }
}
