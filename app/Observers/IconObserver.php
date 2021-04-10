<?php

namespace App\Observers;

use App\Models\Icon;

class IconObserver
{
    /**
     * Handle the Icon "created" event.
     *
     * @param  \App\Models\Icon  $icon
     * @return void
     */
    public function created(Icon $icon)
    {
        \App\Helpers\Slug::update($icon);
    }

    /**
     * Handle the Icon "updated" event.
     *
     * @param  \App\Models\Icon  $icon
     * @return void
     */
    public function updated(Icon $icon)
    {
        //
    }

    /**
     * Handle the Icon "deleted" event.
     *
     * @param  \App\Models\Icon  $icon
     * @return void
     */
    public function deleted(Icon $icon)
    {
        //
    }

    /**
     * Handle the Icon "restored" event.
     *
     * @param  \App\Models\Icon  $icon
     * @return void
     */
    public function restored(Icon $icon)
    {
        //
    }

    /**
     * Handle the Icon "force deleted" event.
     *
     * @param  \App\Models\Icon  $icon
     * @return void
     */
    public function forceDeleted(Icon $icon)
    {
        //
    }
}
