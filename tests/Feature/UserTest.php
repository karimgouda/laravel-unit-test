<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login_user(): void
    {
       User::create([
           'name'=> fake()->name,
           'email'=>'test@gmail.com',
           'password'=> Hash::make('12345678')
       ]);

       $response = $this->post('login',[
           'email'=>'test@gmail.com',
           'password'=>'12345678'
       ]);
      $response->assertStatus(302);
      $response->assertRedirect('home');
    }
}
