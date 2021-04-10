<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Project;
use App\Models\Font;
use App\Models\Icon;
use App\Models\Layout;
use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class CreateFakeProjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layouts = Layout::pluck("id")->toArray();

        //tender.a.com.tm       (eşik dükany)
        Project::create([
            'name' => "Tender",
            'subdomain' => "tender",
            'project_type_id' => ProjectType::where('name', 'fashion')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //hello.a.com.tm        (elektronika)
        Project::create([
            'name' => "Hello",
            'subdomain' => "hello",
            'project_type_id' => ProjectType::where('name', 'electronics')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //ruhybelent.a.com.tm   (apteka)
        Project::create([
            'name' => "Ruhybelent",
            'subdomain' => "ruhybelent",
            'project_type_id' => ProjectType::where('name', 'pharmacy')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //smile.a.com.tm        (food)
        Project::create([
            'name' => "Smile",
            'subdomain' => "smile",
            'project_type_id' => ProjectType::where('name', 'food')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //petri.a.com.tm        (market)
        Project::create([
            'name' => "Petri",
            'subdomain' => "petri",
            'project_type_id' => ProjectType::where('name', 'market')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //mirror.a.com.tm       (kosmetika)
        Project::create([
            'name' => "Mirror",
            'subdomain' => "mirror",
            'project_type_id' => ProjectType::where('name', 'market')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);

        //depder.a.com.tm       (konselyariya)
        Project::create([
            'name' => "Depder",
            'subdomain' => "depder",
            'project_type_id' => ProjectType::where('name', 'market')->firstOrFail()->id,
            'font_id' => Font::all()->random()->id,
            'icon_id' => Icon::all()->random()->id,
            'color_id' => Color::all()->random()->id,
            'is_active' => true,
        ])->layouts()->sync($layouts);
    }
}
