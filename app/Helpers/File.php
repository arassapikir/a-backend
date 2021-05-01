<?php


namespace App\Helpers;

use App\Models\Project;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class File
{

    protected static array $imageSizes = [
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
    public static function resize($img, string $type, Project $project): mixed
    {
        if ($type == "slider"){
            $size = $project->layouts->where('group', 'home')->first()->sizes->where('type', 'slider')->first() ?? 0;
            $img->fit(
                $size->width ?? 900,
                $size->height ?? 600
            );
        }
        elseif ($type == "category"){
            $size = $project->layouts->where('group', 'home')->first()->sizes->where('type', 'category')->first() ?? 0;
            $img->fit(
                $size->width ?? 450,
                $size->height ?? 300
            );
        }
        elseif ($type == "subcategory"){
            $size = $project->layouts->where('group', 'subcategory')->first()->sizes->where('type', 'subcategory')->first() ?? 0;
            $img->fit(
                $size->width ?? 250,
                $size->height ?? 250
            );
        }
        elseif (isset(self::$imageSizes[$type])){
            $img->fit(
                self::$imageSizes[$type]["width"],
                self::$imageSizes[$type]["height"]
            );
        }
        return $img;
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
        $project = Project::findOrFail(config()->get('project')->id);

        $img = Image::make($image);
        $img = self::resize($img, $type, $project);
        $name = Str::slug($name) . '-' . uniqid() . '.' . $image->extension();
        $path = "images/projects/{$project->subdomain}/$folder/$name";
        $img->save(base_path('public/'.$path));
        return $path;
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
}
