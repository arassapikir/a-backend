<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SliderResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return $this->successResponse([
            "project" => new ProjectResource($this->project),
            "sliders" => SliderResource::collection($this->project->sliders),
            "categories" => CategoryResource::collection($this->project->category_parents)
        ]);
    }
}
