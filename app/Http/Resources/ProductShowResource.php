<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
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

            'id'                    => (int)        $this->id,
            'cover'                 =>              $this->cover_url,
            'brand'                 =>              $this->brand_label,
            'title'                 => (string)     $this->title->{app()->getLocale()},
            'description'           => (string)     $this->description->{app()->getLocale()},
            'price'                 => (float)      $this->price,
            'is_discounted'         => (boolean)    $this->discounted,
            'discounted_price'      =>              $this->discounted_price,
            'discounted_percentage' =>              $this->discounted_percentage,
            'is_new'                => (boolean)    $this->new,
            'stock'                 => (int)        $this->stock,

            'sliders' => ProductSliderResource::collection($this->sliders),
            'parameters' => ProductParameterResource::collection($this->values),
        ];

        if ($this->stock_type == 2){
            $data["sizes"] = ProductSizeResource::collection($this->sizes);
        }

        return $data;
    }
}
