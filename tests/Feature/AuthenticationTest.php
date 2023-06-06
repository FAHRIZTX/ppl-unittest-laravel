<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    public function test_access_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    public function test_login(): void
    {
        $response = $this->get(route('login.index'));

        $response->assertStatus(200);

        $response = $this->post(route('login.process'), [
            'email' => 'dimas@gmail.com',
            'password' => 'dimas'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('mahasiswa.index'));
    }

    public function test_logout(): void
    {
        $this->actingAs(User::where('role', 'admin')->first());

        $response = $this->get(route('mahasiswa.index'));
        $response->assertStatus(200);
        $response->assertSee('Data Mahasiswa');

        $response = $this->get(route('logout'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login.index'));
    }
}
