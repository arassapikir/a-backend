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
            'id' => $this->id,
            'brand' => $this->brand_label,
            'title' => $this->title->{app()->getLocale()},
            'description' => $this->description->{app()->getLocale()},
            'price' => number_format($this->price, 2),
            'is_discounted' => $this->discounted,
            'discounted_price' => number_format($this->discounted_price, 2),
            'discounted_percentage' => $this->discounted_percentage,
            'is_new' => $this->new,
            'sliders' => ProductSliderResource::collection($this->sliders),
            'parameters' => ProductParameterResource::collection($this->values),
        ];

        if ($this->stock_type == 2){
            $data["sizes"] = ProductSizeResource::collection($this->sizes);
        }

        return $data;
    }
}
