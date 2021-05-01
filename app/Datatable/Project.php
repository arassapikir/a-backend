<?php


namespace App\Datatable;


use Illuminate\Support\Facades\Auth;

class Project
{
    public static function header() : string
    {
        if (Auth::user()->is_customer()){
            return "";
        }
        return "<th>Proýekt</th>";
    }

    public static function body($item) : string
    {
        if (Auth::user()->is_customer()){
            return "";
        }
        return "<td>$item->group_label</td>";
    }

    public static function js() : string
    {
        if (Auth::user()->is_customer()){
            return "";
        }
        return "{data: 'project', name: 'project', searchable: false, orderable: false},";
    }
}
