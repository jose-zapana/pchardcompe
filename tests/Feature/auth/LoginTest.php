<?php

namespace Tests\Feature\auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function displayLoginForm()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function validateHasErrorEmail()
    {
        $response = $this->post(route('login', []));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('dni');
    }

    /**
     * @test
     */
    public function loginAuthenticatedAndRedirectToHome()
    {
        $user = factory(User::class)->create();
        $response = $this->post(route('login', [
            'dni' => $user->dni,
            'password' => 'password'
        ]));

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function registerUserAndRedirectToHome()
    {
        $response = $this->post(route('register', [
            'name' => 'Jack Solis',
            'email' => 'jacksolis@gmail.com',
            'dni' => '14714714',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]));

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', [
            'name' => 'Jack Solis',
            'email' => 'jacksolis@gmail.com'
        ]);
    }

    /**
     * @test
     */
    public function authenticatedUserWithActingAs()
    {
        // Genera los seeders
        $this->seed();

        // Crea el usuario
        $user = factory(User::class)->create();

        // Asigna el Role
        $user->assignRole('admin');

        $response = $this->actingAs($user)->get(route('category.index'));

        $response->assertStatus(200);
    }


}
