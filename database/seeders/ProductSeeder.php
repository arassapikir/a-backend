<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->truncate();
        \DB::table('products')->truncate();
        \DB::table('parameters')->truncate();
        \DB::table('product_parameters')->truncate();
        $size_parent = Parameter::create([
            'title' => [
                'tk' => "Size (tk)",
                'ru' => "Size (ru)",
            ],
            'type' => 1
        ]);
        $sizes = [
            "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "XS", "X", "M", "L", "XL", "XXL",
        ];
        foreach ($sizes as $size){
            $size_parent->children()->create([
                'title' => [
                    'tk' => $size,
                    'ru' => $size,
                ],
                'type' => $size_parent->type
            ]);
        }
        for ($j = 1; $j < 4; $j++){
            $parameter = Parameter::create([
                'title' => [
                    'tk' => "Parameter $j (tk)",
                    'ru' => "Parameter $j (ru)",
                ],
                'type' => 0
            ]);
            for ($i = 1; $i < 4; $i++){
                $parameter->children()->create([
                    'title' => [
                        'tk' => "Value $j $i (tk)",
                        'ru' => "Value $j $i (ru)",
                    ],
                    'type' => $parameter->type
                ]);
            }
        }
        Brand::create([
            "name" => "Samsung"
        ]);
        Brand::create([
            "name" => "Apple"
        ]);
        Brand::create([
            "name" => "H&M"
        ]);
        Brand::create([
            "name" => "Zara"
        ]);
        Brand::create([
            "name" => "Ülker"
        ]);
        $brands = Brand::all();
        $sizes = Parameter::whereNotNull("parent_id")->where("type", Parameter::size())->get();
        $parameters = Parameter::whereNotNull("parent_id")->where("type", "<>", Parameter::size())->get();
        $discounts = [50, 60, 70, 75, 80, 90, 95];
        foreach (Category::doesntHave("children")->get() as $category){
            for ($i = 0; $i < rand(15, 30); $i++){
                $faker = \Faker\Factory::create();
                $product = Product::create([
                    'project_id' => $category->project_id,
                    'category_id' => $category->id,
                    'brand_id' => rand(0, 1) ? $brands->random()->id : null,
                    'title' => [
                        'tk' => ucfirst(implode(' ', $faker->words(3))) . " (tk)",
                        'ru' => ucfirst(implode(' ', $faker->words(3))) . " (ru)",
                    ],
                    'description' => [
                        'tk' => (implode(' ', $faker->sentences(5))) . " (tk).",
                        'ru' => (implode(' ', $faker->sentences(5))) . " (ru).",
                    ],
                    'price' => rand(100, 10000) / 100,
                    'order' => $i + 1,
                    'stock_type' => $category->project->is_stock_parameter_required() ? 2 : 1,
                    'stock' => $category->project->is_stock_parameter_required() ? 0 : rand(10, 100),
                    'created_at' => Carbon::now()->subDays(rand(0, 20)),
                    'updated_at' => Carbon::now()->subDays(rand(0, 20)),
                ]);

                if (rand(0, 1)){
                    $product->update([
                        'discounted_price' => $product->price * $discounts[rand(0, 6)] / 100,
                    ]);
                }

                if ($category->project->is_stock_parameter_required()){
                    $size = $sizes->random();
                    $product->values()->attach($size->id, ['parent_id' => $size->parent_id, 'stock' => rand(10, 100)]);
                }

                foreach ($parameters->random(rand(2, 4)) as $parameter){
                    $product->values()->attach($parameter->id, ['parent_id' => $parameter->parent_id]);
                }

                $product->pictures()->create([
                    'type' => 'cover',
                    'url' => "images/products/img.png"
                ]);

                $image = $product->pictures()->create([
                    'type' => 'slider',
                    'url' => "images/products/img.png"
                ]);

                $product->pictures()->create([
                    'parent_id' => $image->id,
                    'type' => 'original',
                    'url' => "images/products/img.png"
                ]);
            }
        }
    }
}
