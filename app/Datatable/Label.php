<?php


namespace App\Datatable;


class Label
{
    public static function image(mixed $img) : string
    {
        if (!$img){
            return "-";
        }
        $img = asset($img);
        return "<img src='$img' alt='image' style='height: 100px; width: auto;'>";
    }

    public static function multiLanguageLabel(mixed $title) : string
    {
        $tk = $title->tk ?? '-';
        $ru = $title->ru ?? '-';
        return "
            <div class='d-flex flex-column flex-grow-1 font-weight-bold'>
                <a href='javascript:voiid(0)' class='text-dark text-hover-primary mb-1 font-size-lg'>$tk</a>
                <span class='text-muted'>$ru</span>
            </div>
        ";
    }
}
