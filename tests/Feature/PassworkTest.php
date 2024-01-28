<?php

namespace Tests\Feature;

use App\Models\Passwork;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PassworkTest extends TestCase
{

    public function test_passwork_can_be_created()
    {
        // Crear una contraseña usando el modelo
        $passwork = Passwork::factory()->create();

        // Verificar que se haya creado correctamente
        $this->assertDatabaseCount('passworks', 1);
        $this->assertDatabaseHas('passworks', ['id' => $passwork->id]);
    }

    // Agrega más pruebas según sea necesario

}
