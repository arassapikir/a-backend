<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\User;
use App\Models\Visitor;
use App\Traits\ApiResponse;
use App\Traits\GlobalVariables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use Log;

class CheckApi
{
    use ApiResponse, GlobalVariables;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): mixed
    {
        /**
         * checking subdomain
         */
        $subdomain = strtolower($request->header('X-Domain'));
        $project = Project::whereSubdomain($subdomain)->first();
        if (!$project){
            return $this->errorResponse('Invalid headers', 409);
        }
        $this->project = $project;

        /**
         * checking language
         */
        $locale = strtolower($request->header('Accept-Language'));
        if (!array_key_exists($locale, config('app.locales'))){
            return $this->errorResponse('Invalid headers', 409);
        }
        app()->setLocale($locale);


        /**
         * checking platform
         */
        $platform = strtolower($request->header('X-Platform'));
        if (!in_array($platform, array_keys(config('app.platforms')))){
            return $this->errorResponse('Invalid headers', 409);
        }

        /**
         * checking app version
         */
        $version = $request->header('X-Version');
        if (!$version){
            return $this->errorResponse('Invalid headers', 409);
        }

        /**
         * checking app version is valid or not
         */
        if (!in_array($version, config('app.platforms.'.$platform))){
            return $this->errorResponse(__('config.min_support_fail'), 406);
        }

        /**
         * checking token
         */
        /**
         * checking platform
         */
        $token = strtolower($request->header('X-Token'));
        if (!$token){
            return $this->errorResponse('Invalid headers', 409);
        }

        if (!Auth::guard('api')->check()){
            try {
                Visitor::updateOrCreate(
                    [
                        'token' => $token,
                    ],
                    [
                        'subdomain' => $project->subdomain,
                        'ip' => $request->ip(),
                        'language' => $locale,
                        'platform' => $platform,
                        'version' => $version,
                        'last_visited_at' => now(),
                    ]
                );
            }
            catch (Exception $e){
                Log::error($e->getMessage());
            }
        }

        /**
         * checking user logged in, if yes updating data
         */
        if (Auth::guard('api')->check()) {
            try {
                $user = User::findOrFail(Auth::guard('api')->id());
                $user->update([
                    'ip' => $request->ip(),
                    'language' => $locale,
                    'platform' => $platform,
                    'version' => $version,
                    'last_visited_at' => now()
                ]);
                $visitor = Visitor::whereToken($token)->first();
                if ($visitor){
                    $visitor->delete();
                }

                if (in_array($user->status, $this->blocked_user_statuses)){
                    return $this->errorResponse(__('config.user_is_blocked'), 451);
                }
            }
            catch (Exception $e){
                Log::error($e->getMessage());
            }
        }

        return $next($request);
    }
}
