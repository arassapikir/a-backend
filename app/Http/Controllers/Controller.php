<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponse;
use App\Traits\WebResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, WebResponse, ApiResponse;

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
