<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('project_type', 'color', 'font', 'icon', 'layouts')->get();
        return view('projects.projects.index', compact('projects'));
    }
}
