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
        \App\Models\ProjectType::insert(
            [
                "name" => "Electronics",
                "type" => false
            ],
            [
                "name" => "Fashion",
                "type" => false
            ],
            [
                "name" => "Food",
                "type" => false
            ],
            [
                "name" => "Market",
                "type" => false
            ],
            [
                "name" => "Pharmacy",
                "type" => false
            ]
        );

        \App\Models\Font::insert(
            [
                "name" => "Font style 1"
            ],
            [
                "name" => "Font style 2"
            ]
        );

        \App\Models\Color::insert(
            [
                'name' => 'Color set 1',
                'color_1' => "#FFFFFF",
                'color_2' => "#000000",
            ],
            [
                'name' => 'Color set 2',
                'color_1' => "#FF5733",
                'color_2' => "#756765",
            ]
        );


        \App\Models\Icon::insert(
            [
                'name' => 'Icon set 1'
            ],
            [
                'name' => 'Icon set 2'
            ]
        );
    }
}
