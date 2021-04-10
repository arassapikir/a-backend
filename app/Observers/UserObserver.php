<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if( request()->is('api/*')){
            $user->update([
                'ip' => request()->ip(),
                'platform' => strtolower(request()->header('Platform')),
                'version' => request()->header('Version'),
                'language' => strtolower(request()->header('Language')),
                'last_visited_at' => now(),
                'fcm_token' => request()->get('X-Fcm-Token'),
                'token' => request()->get('X-Token')
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if( request()->is('api/*')){
           $user->update([
               'ip' => request()->ip(),
               'platform' => strtolower(request()->header('Platform')),
               'version' => request()->header('Version'),
               'language' => strtolower(request()->header('Language')),
               'last_visited_at' => now(),
               'fcm_token' => request()->get('X-Fcm-Token'),
               'token' => request()->get('X-Token')
           ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
