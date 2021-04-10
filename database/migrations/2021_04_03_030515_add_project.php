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


        \App\Models\Project::create([
            'name' => "Adidas",
            'subdomain' => "adidas",
            'project_type_id' => 3,
            'icon_id' => \App\Models\Font::firstOrFail()->id,
            'font_id' => \App\Models\Icon::firstOrFail()->id,
            'color_id' => \App\Models\Color::firstOrFail()->id,
            'is_active' => true,
        ]);

        \App\Models\Project::create([
            'name' => "Apple",
            'subdomain' => "apple",
            'project_type_id' => 2,
            'icon_id' => \App\Models\Font::firstOrFail()->id,
            'font_id' => \App\Models\Icon::firstOrFail()->id,
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
