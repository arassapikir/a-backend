<?php

namespace App\Http\Resources;

use App\Models\Parameter;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductParameterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "type" => Parameter::$types[$this->type],
            "parameter_id" => $this->parent_id,
            "parameter_title" => $this->parent->title->{app()->getLocale()} ?? "-",
            "value_id" => $this->id,
            "value_title" => $this->title->{app()->getLocale()} ?? "-",
        ];
    }
}
