<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserObserver
{
    public function update(User $user){
        if( request()->is('api/*')){
            DB::table('users')->update([
                'ip' => request()->ip(),
                'platform' => strtolower(request()->header('Platform')),
                'version' => request()->header('Version'),
                'language' => strtolower(request()->header('Language')),
                'last_visited_at' => now(),
                'updated_at' => now(),
                'fcm_token' => request()->get('X-Fcm-Token'),
                'token' => request()->get('X-Token'),
                'hits' => $user->hits + 1
            ]);
        }
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->update($user);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $this->update($user);
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
