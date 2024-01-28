<?php

namespace Tests\Feature;

use App\Models\Passwork;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PassworkControllerTest extends TestCase
{

    public function test_index_method_returns_passworks_for_authenticated_user()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crear algunas contraseñas asociadas al usuario
        Passwork::factory()->count(5)->create(['user_id' => $user->id]);

        // Hacer una solicitud a la ruta del índice
        $response = $this->get(route('passworks.index'));

        // Verificar que la respuesta contiene las contraseñas del usuario
        $response->assertStatus(200)
                 ->assertViewHas('passworks')
                 ->assertSee('Nombre de la Contraseña 1') // Reemplazar con el nombre real de la contraseña
                 ->assertSee('Nombre de la Contraseña 2')
                 // ...
                 ->assertSee('Nombre de la Contraseña 5');
    }


}
