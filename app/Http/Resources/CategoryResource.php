<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        $data = [
//            'id' => $this->id,
//            'title' => $this->title_translation,
//            'image' => asset($this->image),
//        ];
//        $subcategories = \App\Models\Category::where('parent_id', $this->id)->get();
//        if ($subcategories->count() > 0){
//            $data["subcategories"] = CategoryResource::collection($subcategories);
//        }
//        return $data;
        return [
            'id' => $this->id,
            'parent' => count($this->children) == 0,
            'title' => $this->title_translation,
            'image' => asset($this->image),
        ];
    }
}
