<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class Variable
{
    public static function projectId() : int
    {
        if (Auth::user()->is_admin()){
            return request()->get('project_id');
        }
        else{
            return Auth::user()->project_id;
        }
    }
}
