<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Ordinateur portable',
            'description' => 'Un ordinateur puissant.',
            'price' => 1200.00,
        ]);

        Product::create([
            'name' => 'Smartphone',
            'description' => 'Un smartphone dernière génération.',
            'price' => 800.00,
        ]);

        Product::create([
            'name' => 'Tablette',
            'description' => 'Une tablette tactile.',
            'price' => 400.00,
        ]);

       
    }
}
