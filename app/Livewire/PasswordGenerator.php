<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class PasswordGenerator extends Component
{
    public $password;

    public function render()
    {
        return view('livewire.password-generator');
    }

    public function generatePassword(Request $request)
    {
        $length = $request->input('length', 12);
        $useUppercase = $request->input('useUppercase', false);
        $useLowercase = $request->input('useLowercase', false);
        $useNumbers = $request->input('useNumbers', false);
        $useSymbols = $request->input('useSymbols', false);

        $characters = '';

        if ($useUppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($useLowercase) {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($useNumbers) {
            $characters .= '0123456789';
        }
        if ($useSymbols) {
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        }

        $password = '';

        $charactersLength = strlen($characters);


        // Verificar si la cadena tiene al menos un carácter antes de entrar en el bucle
        if ($charactersLength > 0) {
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[random_int(0, max(0, $charactersLength - 1))];
            }
        }

        echo $password;


        // Actualizar solo la sección específica
        $this->dispatch('passwordGenerated', ['password' => $password]);
    }
}
