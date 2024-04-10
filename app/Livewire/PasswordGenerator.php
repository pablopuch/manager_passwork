<?php

namespace App\Livewire;

use Livewire\Component;


class PasswordGenerator extends Component
{
    public $password;
    public $length = 12;
    public $useUppercase = true;
    public $useLowercase = true;
    public $useNumbers = true;
    public $useSymbols = true;

    public function mount()
    {
        // Lógica para generar una contraseña automáticamente al cargar el componente
        $this->generatePassword();
    }

    public function render()
    {
        return view('livewire.password-generator');
    }

    public function generatePassword()
    {
        // Generar el conjunto de caracteres basado en las preferencias del usuario
        $characters = $this->generateCharacterPool();

        $password = '';

        // Verificar si la cadena tiene al menos un carácter antes de entrar en el bucle
        if ($this->length > 0) {
            // Generar la contraseña carácter por carácter
            for ($i = 0; $i < $this->length; $i++) {
                // Seleccionar aleatoriamente un carácter del conjunto de caracteres
                $password .= $characters[random_int(0, max(0, count($characters) - 1))];
            }
        }

        // Actualizar la propiedad $password
        $this->password = $password;

        // Actualizar solo la sección específica usando Livewire
        $this->dispatch('passwordGenerated', ['password' => $password]);
    }

    // Método privado para generar el conjunto de caracteres basado en las preferencias del usuario
    private function generateCharacterPool()
    {
        $characters = [];

        // Agregar caracteres al conjunto basado en las preferencias del usuario
        if ($this->useUppercase) {
            $characters = array_merge($characters, str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'));
        }
        if ($this->useLowercase) {
            $characters = array_merge($characters, str_split('abcdefghijklmnopqrstuvwxyz'));
        }
        if ($this->useNumbers) {
            $characters = array_merge($characters, str_split('0123456789'));
        }
        if ($this->useSymbols) {
            $characters = array_merge($characters, str_split('!@#$%^&*()_+-=[]{}|;:,.<>?'));
        }

        return $characters;
    }
}
