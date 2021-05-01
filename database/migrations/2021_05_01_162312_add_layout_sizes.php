<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLayoutSizes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $home_1 = \App\Models\Layout::findOrFail(1);
        $sub_1 = \App\Models\Layout::findOrFail(2);
        $products_1 = \App\Models\Layout::findOrFail(3);
        $product_1 = \App\Models\Layout::findOrFail(4);

        $home_1->sizes()->create([
            'type' => "slider",
            'width' => 900,
            'height' => 600,
        ]);

        $home_1->sizes()->create([
            'type' => "category",
            'width' => 450,
            'height' => 300,
        ]);

        $sub_1->sizes()->create([
            'type' => "subcategory",
            'width' => 250,
            'height' => 250,
        ]);

        $products_1->sizes()->create([
            'type' => "products",
            'width' => 500,
            'height' => 500,
        ]);

        $product_1->sizes()->create([
            'type' => "product-slider",
            'width' => 600,
            'height' => 900,
        ]);

        $product_1->sizes()->create([
            'type' => "product-zoom",
            'width' => 600,
            'height' => 900,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
