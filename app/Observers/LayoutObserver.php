<?php

namespace App\Observers;

use App\Models\Layout;

class LayoutObserver
{
    /**
     * Handle the Layout "created" event.
     *
     * @param  \App\Models\Layout  $layout
     * @return void
     */
    public function created(Layout $layout)
    {
        \App\Helpers\Slug::update($layout);
    }

    /**
     * Handle the Layout "updated" event.
     *
     * @param  \App\Models\Layout  $layout
     * @return void
     */
    public function updated(Layout $layout)
    {
        //
    }

    /**
     * Handle the Layout "deleted" event.
     *
     * @param  \App\Models\Layout  $layout
     * @return void
     */
    public function deleted(Layout $layout)
    {
        //
    }

    /**
     * Handle the Layout "restored" event.
     *
     * @param  \App\Models\Layout  $layout
     * @return void
     */
    public function restored(Layout $layout)
    {
        //
    }

    /**
     * Handle the Layout "force deleted" event.
     *
     * @param  \App\Models\Layout  $layout
     * @return void
     */
    public function forceDeleted(Layout $layout)
    {
        //
    }
}
