<?php


namespace App\Helpers;


class Input
{
    /**
     * @param $request
     * @param string $attribute
     * @param $languages
     * @return array
     */
    public static function getText($request, string $attribute, $languages = null) : array
    {
        if (!$languages){
            $languages = config('app.locales');
        }
        $data = [];
        foreach (array_keys($languages) as $lang){
            $data[$lang] = $request[$attribute.'_'.$lang];
        }
        return $data;
    }
}
