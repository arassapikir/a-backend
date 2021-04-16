<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        return $this->successResponse([
            "categories" => CategoryResource::collection($category->children->where('project_id', $this->project->id))
        ]);
    }
}
