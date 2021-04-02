<?php


namespace App\Helpers;
use Exception;


class Assets
{
    public static function version($path, $type): string
    {
        $path = '/' . $path;
        try {
            $version = "?v=" . \File::lastModified(public_path() . $path);
        }
        catch (Exception $e){
            $version = "";
        }
        if ($type == 'css'){
            return "<link href='{$path}{$version}' rel='stylesheet' type='text/css'/>";
        }
        return "<script src='{$path}{$version}'></script>";
    }
}
