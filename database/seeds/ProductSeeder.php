<?php

use App\Models\Product;
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
        Product::create([
            'name' => 'Product1111',
            'description' => 'Some Desc',
            'price' => 25,
            'image' => 'asd',
            'user_id' => 1
        ]);

        Product::create([
            'name' => 'Product11313313111',
            'description' => 'Some Desc1231',
            'price' => 215,
            'image' => 'asd',
            'user_id' => 1
        ]);

        Product::create([
            'name' => 'Great',
            'description' => 'Some 1 Desc',
            'price' => 15,
            'image' => 'asd',
            'user_id' => null
        ]);


    }
}
