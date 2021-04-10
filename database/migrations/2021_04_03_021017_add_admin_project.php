<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $project_type = \App\Models\ProjectType::create([
            "name" => "Administratiw",
            "type" => true
        ]);

        \App\Models\ProjectType::create([
            "name" => "Electronics",
            "type" => false
        ]);

        $project = \App\Models\ProjectType::create([
            "name" => "Fashion",
            "type" => false
        ]);

        \App\Models\ProjectType::create([
            "name" => "Food",
            "type" => false
        ]);

        \App\Models\ProjectType::create([
            "name" => "Market",
            "type" => false
        ]);

        \App\Models\ProjectType::create([
            "name" => "Pharmacy",
            "type" => false
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
            'name' => "Admin",
            'subdomain' => "admin",
            'project_type_id' => $project_type->id,
            'font_id' => \App\Models\Font::firstOrFail()->id,
            'icon_id' => \App\Models\Icon::firstOrFail()->id,
            'color_id' => \App\Models\Color::firstOrFail()->id,
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
