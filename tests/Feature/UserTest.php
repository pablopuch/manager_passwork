<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    public function test_user_can_be_created()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'), // Asegúrate de usar bcrypt para la contraseña
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302); // Verifica que la creación de usuario redireccione (ajusta según tu lógica)
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }
}
