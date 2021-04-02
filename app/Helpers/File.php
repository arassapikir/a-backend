<?php


namespace App\Helpers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class File
{

    protected static $imageSizes = [
        'store_category' => [
            'width' => 100,
            'height' => 100,
        ]
    ];

    /**
     * @param $img
     * @param string $type
     * @return mixed
     */
    public static function resize($img, string $type){
        if (isset(self::$imageSizes[$type])){
            $img->fit(
                self::$imageSizes[$type]["width"],
                self::$imageSizes[$type]["height"]
            );
        }
        return $img;
    }

    /**
     * @param $file
     * @param string $folder_name
     * @return string
     */
    public static function storeFile($file, string $folder_name) : string
    {
        $destinationPath = "files/$folder_name/";
        $filename = date('Y-m-d_His') . "_" . uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return $destinationPath.$filename;
    }

    /**
     * @param $image
     * @param string $name
     * @param string $folder
     * @param string $type
     * @return string
     */
    public static function storeImage($image, string $name, string $folder, string $type = "default") : string
    {
        $img = Image::make($image);
        $img = self::resize($img, $type);
        $name = Str::slug($name) . '-' . uniqid() . '.' . $image->extension();
        $path = "images/$folder/$name";
        $img->save(base_path('public/'.$path));
        return $path;
    }
}
