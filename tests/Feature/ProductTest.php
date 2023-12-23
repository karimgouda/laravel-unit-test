<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_empty_data_in_product_page(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/product');
        $response->assertSee('Product Not Found');
        $response->assertStatus(200);
    }

    public function test_non_empty_data_in_product_page()
    {
        $user = User::factory()->create();
        $product =  Product::create([
            'title'=> fake()->title,
            'price'=> 100.00,
            'description'=>fake()->text(60),
            'user_id' =>$user->id
        ]);
        $response = $this->actingAs($user)->get('/product');
        $response->assertDontSee('Product Not Found');
        $response->assertViewHas('products' , function ($item) use ($product){
            return $item->contains($product);
        });
       $response->assertStatus(200);
    }
}
