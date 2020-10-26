<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, InteractsWithExceptionHandling;

    /**
    * @test
    */
    public function user_cannot_retrieve_not_existing_product()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->getJson('/api/products/1')
            ->assertStatus(404);
    }

    /**
    * @test
    */
    public function user_can_retrieve_list_of_products()
    {
        factory(Product::class)->create();

        $user = factory(User::class)->create();

        $products = $this->actingAs($user)
            ->getJson('/api/products')
            ->assertStatus(200)
            ->decodeResponseJson('data');

        $this->assertCount(1, $products);
    }

    /**
     * @test
     */
    public function product_can_be_created()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/api/products/create', [
            'name' => 'P1',
            'description' => 'Desc P1',
            'price' => '111',
            'image' => 'asda',
        ])->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'name' => 'P1'
        ]);
    }

//    /**
//     * @test
//     */
//    public function product_can_be_deleted()
//    {
//        $user = factory(User::class)->create();
//
//        $this->actingAs($user)
//            ->post('/api/products/create', [
//                'name' => 'P1',
//                'description' => 'Desc P1',
//                'price' => '111',
//                'image' => 'asda',
//            ])->assertStatus(200);
//
//        $this->assertDatabaseHas('products', [
//            'name' => 'P1'
//        ]);
//
//        $product = Product::first();
//
//        $this->actingAs($user)
//            ->post('/api/products/delete/' . $product->id)
//            ->assertStatus(200);
//
//        $products = Product::all();
//        $this->assertCount(0, $products);
//    }

    /**
     * @test
     */
    public function user_can_be_added_to_product()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/api/products/create', [
                'name' => 'P1',
                'description' => 'Desc P1',
                'price' => '111',
                'image' => 'asda',
            ])->assertStatus(200);

        $product = Product::all()->take(1);

        $this->actingAs($user)
            ->post('/api/products/add_user/' . $product[0]['id'])
            ->assertStatus(200);

    }
}
