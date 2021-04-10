<?php

namespace App\Http\Resources;

use App\Models\Layout;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            "name" => $this->name,
            "project_type_id" => $this->project_type->name ?? "default",
            "font_id" => $this->font->name ?? "default",
            "icon_id" => $this->color->name ?? "default",
            "color_id" => $this->icon->name ?? "default",
        ];
        foreach (Layout::$layouts as $layout => $title){
            $data["layout_$layout"] = $this->layouts->where("group", $layout)->first()->name ?? "defualt";
        }
        return $data;
    }
}
