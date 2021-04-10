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
        $subdomain = strtolower(request()->header('X-Domain'));
        $project = Project::whereSubdomain($subdomain)->first();
        if (!$project || $subdomain == "admin"){
            return $this->errorResponse('Invalid headers', 409);
        }
        $this->project = $project;
    }
}
