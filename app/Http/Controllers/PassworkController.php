<?php

namespace App\Http\Controllers;

use App\Models\Passwork;
use App\Models\Passgroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Encryption\DecryptException;


/**
 * Class PassworkController
 * @package App\Http\Controllers
 */
class PassworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');

            $passworks = Passwork::where('user_id', $user->id)
                ->where('name', 'LIKE', $searchTerm . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10); // Cambia el número según tus necesidades
        } else {
            $passworks = Passwork::where('user_id', $user->id)
                ->orderBy('created_at', 'desc') // Ordena de forma descendente por fecha de creación
                ->paginate(10);
        }

        $passgroups = Passgroup::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('passwork.index', compact('passworks', 'passgroups', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $passwork = new Passwork();

        $passwork->user_id = $user->id; // Asignar el ID del usuario

        $passgroups = Passgroup::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        return view('passwork.create', compact('passwork', 'passgroups', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Passwork::$rules);

        // Obtén la contraseña sin encriptar
        $userPassword = $request->input('password_pass');

        // Define la longitud máxima deseada para la contraseña encriptada (por ejemplo, 250 caracteres)
        $maxCharacterLimit = 250;

        // Encripta la contraseña
        $encryptedPassword = Crypt::encryptString($userPassword);

        // Verificar la longitud de la cadena cifrada
        $length = strlen($encryptedPassword);

        logger()->info('Longitud de la cadena cifrada: ' . $length);

        // Trunca la contraseña encriptada si es más larga de lo permitido
        if (strlen($encryptedPassword) > $maxCharacterLimit) {
            $encryptedPassword = substr($encryptedPassword, 0, $maxCharacterLimit);
        }

        // Asigna la contraseña encriptada limitada a la solicitud
        $request->merge([
            'password_pass' => $encryptedPassword,
        ]);

        $passwork = Passwork::create($request->all());

        return redirect()->route('passworks.index')->with('success', 'Passwork created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            $passwork = Passwork::find($id);

            // Loguea la cadena cifrada antes de intentar descifrarla
            logger()->info('Encrypted password: ' . $passwork->password_pass);

            // Descifrar la contraseña antes de mostrarla
            $passwork->password_pass = Crypt::decryptString($passwork->password_pass);

            // Loguea la cadena descifrada
            logger()->info('Decrypted password: ' . $passwork->password_pass);

            $passgroups = Passgroup::pluck('name', 'id');
            $users = User::pluck('name', 'id');

            return view('passwork.show', compact('passwork', 'passgroups', 'users'));
        } catch (DecryptException $e) {
            // Loguea la excepción para obtener más información
            logger()->error('Error decrypting password: ' . $e->getMessage());

            // Redirige con un mensaje de error más específico
            return redirect()->route('passworks.index')->with('error', 'Error al descifrar la contraseña. Contacta al soporte para obtener ayuda.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passwork = Passwork::find($id);

        // Descifrar la contraseña antes de mostrarla
        $passwork->password_pass = Crypt::decryptString($passwork->password_pass);

        $passgroups = Passgroup::pluck('name', 'id');

        $users = User::pluck('name', 'id');

        return view('passwork.edit', compact('passwork', 'passgroups', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Passwork $passwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passwork $passwork)
    {
        request()->validate(Passwork::$rules);

        // Obtén la contraseña sin encriptar
        $userPassword = $request->input('password_pass');

        // Define la longitud máxima deseada para la contraseña encriptada (por ejemplo, 250 caracteres)
        $maxCharacterLimit = 250;

        // Encripta la contraseña
        $encryptedPassword = Crypt::encryptString($userPassword);

        // Trunca la contraseña encriptada si es más larga de lo permitido
        if (strlen($encryptedPassword) > $maxCharacterLimit) {
            $encryptedPassword = substr($encryptedPassword, 0, $maxCharacterLimit);
        }

        // Asigna la contraseña encriptada limitada a la solicitud
        $request->merge([
            'password_pass' => $encryptedPassword,
        ]);

        $passwork->update($request->all());

        return redirect()->route('passworks.index')->with('success', 'Passwork updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $passwork = Passwork::find($id)->delete();

        return redirect()->route('passworks.index')
            ->with('success', 'Passwork deleted successfully');
    }
}
