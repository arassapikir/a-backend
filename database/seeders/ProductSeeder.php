<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
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
                    'created_at' => Carbon::now()->subDays(rand(0, 20)),
                    'updated_at' => Carbon::now()->subDays(rand(0, 20)),
                ]);

                if (rand(0, 1)){
                    $product->update([
                        'discounted_price' => $product->price * $discounts[rand(0, 6)] / 100,
                    ]);
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
