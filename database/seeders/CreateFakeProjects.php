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

        foreach (Project::where('project_type_id', '<>', 1)->get() as $project) {
            for ($i = 1; $i < 4; $i++){
                $rand = (bool)rand(0, 1);
                $typeRandom = (bool)rand(0, 1);
                $project->sliders()->create([
                    'image' => "images/sliders/$i.jpg" ,
                    'action_type' => $rand ? ($typeRandom ? "product" : "category") : null,
                    'action_id' => $rand ? rand(1, 300) : null,
                ]);
            }

            for ($i = 1; $i < 4; $i++){
                $category = $project->categories()->create([
                    'image' => "images/categories/$i.jpg" ,
                    'title' => [
                        'tk' => "Category $i (tk)",
                        'ru' => "Category $i (ru)",
                    ]
                ]);
                for ($j = 1; $j < 4; $j++){
                    $numb = $j + 3;
                    $sub = $project->categories()->create([
                        'parent_id' => $category->id,
                        'image' => "images/categories/$numb.jpg" ,
                        'title' => [
                            'tk' => "Category $i $j (tk)",
                            'ru' => "Category $i $j (ru)",
                        ]
                    ]);
                    if ((bool)rand(0, 1)){
                        for ($m = 1; $m < 4; $m++) {
                            $numb = $m + 3;
                            $project->categories()->create([
                                'parent_id' => $sub->id,
                                'image' => "images/categories/$numb.jpg",
                                'title' => [
                                    'tk' => "Category $i $j $m (tk)",
                                    'ru' => "Category $i $j $m (ru)",
                                ]
                            ]);
                        }
                    }
                }
            }

        }

    }
}
