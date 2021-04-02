<?php


namespace App\Traits;


use App\Models\Project;

trait GlobalVariables
{
    public Project $project;
    public array $blocked_user_statuses;

    public function __construct()
    {
        $this->project = request()->get('_project');
        $this->blocked_user_statuses = ["blocked", "suspended"];
    }
}
