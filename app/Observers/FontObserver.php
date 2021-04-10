<?php

namespace App\Observers;

use App\Models\Font;

class FontObserver
{
    /**
     * Handle the Font "created" event.
     *
     * @param  \App\Models\Font  $font
     * @return void
     */
    public function created(Font $font)
    {
        \App\Helpers\Slug::update($font);
    }

    /**
     * Handle the Font "updated" event.
     *
     * @param  \App\Models\Font  $font
     * @return void
     */
    public function updated(Font $font)
    {
        //
    }

    /**
     * Handle the Font "deleted" event.
     *
     * @param  \App\Models\Font  $font
     * @return void
     */
    public function deleted(Font $font)
    {
        //
    }

    /**
     * Handle the Font "restored" event.
     *
     * @param  \App\Models\Font  $font
     * @return void
     */
    public function restored(Font $font)
    {
        //
    }

    /**
     * Handle the Font "force deleted" event.
     *
     * @param  \App\Models\Font  $font
     * @return void
     */
    public function forceDeleted(Font $font)
    {
        //
    }
}
