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
        \App\Models\Font::create([
            "title" => "Font style 2"
        ]);



        \App\Models\Color::create([
            'title' => 'Color set 1',
            'color_1' => "#FFFFFF",
            'color_2' => "#000000",
        ]);
        \App\Models\Color::create([
            'title' => 'Color set 2',
            'color_1' => "#FF5733",
            'color_2' => "#756765",
        ]);




        \App\Models\Icon::create([
            'title' => 'Icon set 1'
        ]);\App\Models\Icon::create([
            'title' => 'Icon set 2'
        ]);
    }
}
