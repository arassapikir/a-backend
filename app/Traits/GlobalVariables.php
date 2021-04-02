<?php


namespace App\Traits;


trait GlobalVariables
{
    /**
     * @var \App\Models\Project
     */
    public \App\Models\Project $project;

    /**
     * @var array|string[]
     */
    public array $blocked_user_statuses = ["blocked", "suspended"];
}
