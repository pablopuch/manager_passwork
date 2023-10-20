<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passwork;


class PasswordGeneratorController extends Controller
{
    public function generatePassword(Request $request)
    {

        $passworks = Passwork::paginate(10);

        $length = $request->input('length', 12);
        $useUppercase = $request->input('useUppercase', false);
        $useLowercase = $request->input('useLowercase', false); // Agregamos useLowercase
        $useNumbers = $request->input('useNumbers', false);
        $useSymbols = $request->input('useSymbols', false);

        $characters = '';

        if ($useUppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($useLowercase) { // Agregamos minúsculas
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($useNumbers) {
            $characters .= '0123456789';
        }
        if ($useSymbols) {
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        }

        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return view('passwork.index', ['password' => $password, 'passworks' => $passworks]);
    }
}
