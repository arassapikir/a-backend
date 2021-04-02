<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slug
{
    /**
     * @param Model $model
     * @param string $slug
     * @return string
     */
    public static function createSlug(Model $model, string $slug) : string
    {
        $name = Str::slug($slug);
        if ($model::where('slug', $name)->first()){
            $count = 1;
            while ($model::where('slug', $name.'-'.$count)->first()){
                $count ++;
            }
            return Str::slug($name.'-'.$count);
        }
        return $name;
    }
}
