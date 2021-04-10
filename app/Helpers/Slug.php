<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slug
{
    /**
     * @param Model $model
     * @param string $value
     * @param string $column
     * @return string
     */
    public static function get(Model $model, string $column = "name", string $value = "title") : string
    {
        $name = Str::slug($model->{$value});
        if ($model::where($column, $name)->first()){
            $count = 1;
            while ($model::where($column, $name.'-'.$count)->first()){
                $count ++;
            }
            return Str::slug($name.'-'.$count);
        }
        return $name;
    }

    /**
     * @param Model $model
     * @param string $column
     * @param string $value
     */
    public static function update(Model $model, string $column = "name", string $value = "title"){
        $model->update([
            $column => self::get($model)
        ]);
    }
}
