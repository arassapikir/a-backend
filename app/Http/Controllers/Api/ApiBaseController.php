<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Traits\ApiResponse;

class ApiBaseController extends Controller
{
    use ApiResponse;

    public Project $project;

    public function __construct()
    {
        $this->project = Project::findOrFail(config()->get('project')->id);
    }
}
