<?php


namespace App\Helpers;


class Form
{
    public static function input(string $title, string $name, string $extra = "", string $value="", string $size = "col-md-12", string $type = "text") : string
    {
        return "
            <div class='$size mb-4'>
                <label>$title</label>
                <input type='$type' class='form-control' name='$name' placeholder='$title' value='$value' $extra>
            </div>
        ";
    }
}
