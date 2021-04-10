<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProjectType::create([
            "title" => "Electronics",
            "type" => false
        ]);
        \App\Models\ProjectType::create([
            "title" => "Fashion",
            "type" => false
        ]);
        \App\Models\ProjectType::create([
            "title" => "Food",
            "type" => false
        ]);
        \App\Models\ProjectType::create([
            "title" => "Market",
            "type" => false
        ]);
        \App\Models\ProjectType::create([
            "title" => "Pharmacy",
            "type" => false
        ]);


        \App\Models\Font::create([
            "title" => "Font style 1"
        ]);

        \App\Models\Color::create([
            'title' => 'Color set 1',
            'color_1' => "#CD3021",
            'color_2' => "#C4C4C4",
            'color_3' => "#000000",
            'color_4' => "#FFFFFF",
        ]);

        \App\Models\Icon::create([
            'title' => 'Icon set 1'
        ]);

        \App\Models\Layout::create([
            'group' => "home",
            'title' => 'Home layout 1',
        ]);
        \App\Models\Layout::create([
            'group' => "subcategory",
            'title' => 'Subcategory layout 1',
        ]);
        \App\Models\Layout::create([
            'group' => "product-detail",
            'title' => 'Product detail layout 1',
        ]);
    }
}
