<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitorObserver
{
    /**
     * Handle the Visitor "created" event.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return void
     */
    public function created(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the Visitor "updated" event.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return void
     */
    public function updated(Visitor $visitor)
    {
        DB::table('visitors')->where('id', $visitor->id)->update([
            'hits' => $visitor->hits + 1
        ]);
        //$visitor->increment('hits');
    }

    /**
     * Handle the Visitor "deleted" event.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return void
     */
    public function deleted(Visitor $visitor)
    {
        if (Auth::guard('api')->check()){
            User::findOrFail(Auth::guard('api')->id())->update([
                'hits' => $visitor->hits
            ]);
        }
    }

    /**
     * Handle the Visitor "restored" event.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return void
     */
    public function restored(Visitor $visitor)
    {
        //
    }

    /**
     * Handle the Visitor "force deleted" event.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return void
     */
    public function forceDeleted(Visitor $visitor)
    {
        //
    }
}
