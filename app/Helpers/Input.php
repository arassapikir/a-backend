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
    public static function getText($request, string $attribute, $languages) : array
    {
        $data = [];
        foreach ($languages as $lang){
            $data[$lang->abbreviation] = $request[$attribute.'_'.$lang->abbreviation];
        }
        return $data;
    }
}
