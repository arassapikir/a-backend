<?php

namespace App\Observers;

use App\Models\ProjectType;

class ProjectTypeObserver
{
    /**
     * Handle the ProjectType "created" event.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return void
     */
    public function created(ProjectType $projectType)
    {
        \App\Helpers\Slug::update($projectType);
    }

    /**
     * Handle the ProjectType "updated" event.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return void
     */
    public function updated(ProjectType $projectType)
    {
        //
    }

    /**
     * Handle the ProjectType "deleted" event.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return void
     */
    public function deleted(ProjectType $projectType)
    {
        //
    }

    /**
     * Handle the ProjectType "restored" event.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return void
     */
    public function restored(ProjectType $projectType)
    {
        //
    }

    /**
     * Handle the ProjectType "force deleted" event.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return void
     */
    public function forceDeleted(ProjectType $projectType)
    {
        //
    }
}
