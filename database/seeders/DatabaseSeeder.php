<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $cat_food = Category::create([
            'name' => 'Food'
        ]);

        $cat_electronics = Category::create([
            'name' => 'Electronics'
        ]);

        $cat_appliances = Category::create([
            'name' => 'Appliances'
        ]);

        Product::create([
            'name' => 'Pizza',
            'price' => 49.00,
            'category_id' => $cat_food->id
        ]);

        Product::create([
            'name' => 'Ice Cream',
            'price' => 210.00,
            'category_id' => $cat_food->id
        ]);

        Product::create([
            'name' => 'Cake',
            'price' => 450.00,
            'category_id' => $cat_food->id
        ]);

        Product::create([
            'name' => 'Fried Chicken',
            'price' => 369.00,
            'category_id' => $cat_food->id
        ]);

        Product::create([
            'name' => 'iPhone 14',
            'price' => 80000.00,
            'category_id' => $cat_electronics->id
        ]);

        Product::create([
            'name' => 'Laptop',
            'price' => 45000.00,
            'category_id' => $cat_electronics->id
        ]);

        Product::create([
            'name' => 'Airpods (3rd Gen)',
            'price' => 9484.67,
            'category_id' => $cat_electronics->id
        ]);

        Product::create([
            'name' => 'iPad Max Pro',
            'price' => 74669.12,
            'category_id' => $cat_electronics->id
        ]);

        
        Product::create([
            'name' => 'Washing Machine',
            'price' => 65000.00,
            'category_id' => $cat_appliances->id
        ]);

        Product::create([
            'name' => 'Toaster',
            'price' => 5000.00,
            'category_id' => $cat_appliances->id
        ]);

        Product::create([
            'name' => 'Refrigerator',
            'price' => 120000.00,
            'category_id' => $cat_appliances->id
        ]);

        Product::create([
            'name' => 'Coffee Maker',
            'price' => 24000.00,
            'category_id' => $cat_appliances->id
        ]);
 
    }
}
