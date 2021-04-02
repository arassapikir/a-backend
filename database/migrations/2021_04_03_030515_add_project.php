<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $project = \App\Models\ProjectType::create([
            "name" => "Fashion"
        ]);

        \App\Models\ProjectType::create([
            "name" => "Food"
        ]);

        \App\Models\ProjectType::create([
            "name" => "Market"
        ]);

        \App\Models\ProjectType::create([
            "name" => "Electronics"
        ]);

        \App\Models\ProjectType::create([
            "name" => "Pharmacy"
        ]);

        $font = \App\Models\Font::create([
            "name" => "Font style 1"
        ]);

        \App\Models\Font::create([
            "name" => "Font style 2"
        ]);

        $color = \App\Models\Color::create([
            'name' => 'Color set 1',
            'color_1' => "#FFFFFF",
            'color_2' => "#000000",
        ]);

        \App\Models\Color::create([
            'name' => 'Color set 2',
            'color_1' => "#FF5733",
            'color_2' => "#756765",
        ]);

        $icon = \App\Models\Icon::create([
            'name' => 'Icon set 1'
        ]);

        \App\Models\Icon::create([
            'name' => 'Icon set 2'
        ]);

        \App\Models\Project::create([
            'name' => "Adidas",
            'subdomain' => "adidas",
            'project_type_id' => $project->id,
            'icon_id' => $icon->id,
            'font_id' => $font->id,
            'color_id' => $color->id,
            'is_active' => true,
        ]);

        \App\Models\Project::create([
            'name' => "Apple",
            'subdomain' => "apple",
            'project_type_id' => $project->id,
            'icon_id' => $icon->id,
            'font_id' => $font->id,
            'color_id' => $color->id,
            'is_active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
