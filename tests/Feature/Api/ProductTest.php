<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        factory(Product::class)->create(['name'=>'Product 1','description'=>'desc1','price'=>24,'image'=>'http://']);

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
}
