<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where("project_id", config()->get('project')->id)->where('phone', $request->get('phone'))->first();
            if ($user &&
                Hash::check($request->get('password'), $user->password)) {
                if (!$user->project->is_active || $user->status == "suspended"){
                    throw ValidationException::withMessages([
                        Fortify::username() => "Arassa Pikir administrasiýasy tarapyndan bloklanypsyňyz. Goşmaça maglumat üçin habarlaşyp bilersiňiz.",
                    ]);
                }elseif (!$user->project->is_active || $user->status == "blocked"){
                    throw ValidationException::withMessages([
                        Fortify::username() => config()->get("project")->name . " administrasiýasy tarapyndan bloklanypsyňyz.",
                    ]);
                }elseif (!$user->project->is_active || $user->status == "unverified"){
                    throw ValidationException::withMessages([
                        Fortify::username() => "Hasabyňyz tassyklanmadyk. Adminstratoryňyza habar edip tassyklanmagyny soraň.",
                    ]);
                }
                return $user;
            }
            else {
                throw ValidationException::withMessages([
                    Fortify::username() => __("auth.failed"),
                ]);
            }
        });

        $this->configurePermissions();
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        //
    }
}
