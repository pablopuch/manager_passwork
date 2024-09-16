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
        // Generar una contraseña automáticamente al cargar el componente
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

        // Disparar un evento de Livewire para la actualización de la contraseña (opcional)
        $this->dispatch('passwordGenerated', ['password' => $password]);
    }

    public function updated($propertyName)
    {
        // Al actualizar una propiedad, verificar que al menos una casilla esté marcada
        $this->validateCheckboxes();

        // Generar la contraseña automáticamente cuando se actualicen los valores
        $this->generatePassword();
    }

    private function validateCheckboxes()
    {
        // Si el usuario desmarca todas las opciones, restaurar al menos una por defecto
        if (!$this->useUppercase && !$this->useLowercase && !$this->useNumbers && !$this->useSymbols) {
            // Por ejemplo, volver a marcar las minúsculas si ninguna opción está marcada
            $this->useNumbers = true;
        }
    }

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
