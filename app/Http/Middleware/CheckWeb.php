<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckWeb
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        /**
         * checking subdomain
         */
        $host = explode(".", $request->getHttpHost());

        //checking subdomain exists or not.
        if (strtolower($host[0]) == "a"){
            config()->set('project', new Project([
                'name' => 'A',
                'subdomain' => 'a',
                'is_active' => true,
            ]));
        }
        //if exists, add project to config
        else{
            config()->set('project', Project::whereSubdomain(strtolower($host[0]))->firstOrFail());
        }

        if (Auth::check()){
            /**
             * checking user blocked or not
             */
            if (Auth::user()->is_user_blocked() || !config()->get('project')->is_active){
                abort(451);
            }

            //trigger update user
            event('eloquent.updated: App\Models\User', Auth::user());
        }

        return $next($request);
    }
}
