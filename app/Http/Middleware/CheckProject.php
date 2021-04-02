<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

class CheckProject
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $host = explode(".", $request->getHttpHost());

        if (count($host) != 3){
            abort(404);
        }

        $project = Project::whereSubdomain($host[0])->first();
        if (!$project){
            abort(404);
        }

        $request->merge([
            '_project' => $project
        ]);

        return $next($request);
    }
}
