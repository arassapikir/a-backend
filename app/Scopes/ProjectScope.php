<?php


namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ProjectScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (Auth::user()->is_customer()){
            $builder->where('project_id', Auth::user()->project_id);
        }
    }
}
