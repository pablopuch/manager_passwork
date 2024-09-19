<?php

namespace App\Http\Controllers;

use App\Models\Passgroup;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


/**
 * Class PassgroupController
 * @package App\Http\Controllers
 */
class PassgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $passgroups = Passgroup::where('user_id', $user->id)
            ->paginate(10);

        $users = User::pluck('name', 'id');

        return view('passgroup.index', compact('passgroups', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $passgroup = new Passgroup();

        $passgroup->user_id = $user->id; // Asignar el ID del usuario

        $users = User::pluck('name', 'id');

        return view('passgroup.create', compact('passgroup', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Passgroup::$rules);

        $passgroup = Passgroup::create($request->all());

        return redirect()->route('passgroups.index')
            ->with('success', 'Passgroup created successfully.');
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
            // Encuentra el grupo de contraseñas por su ID
            $passgroup = Passgroup::findOrFail($id);

            // Obtén todas las contraseñas asociadas a este grupo
            $passworks = $passgroup->passworks;

            // Descifra cada contraseña antes de mostrarla
            foreach ($passworks as $passwork) {
                try {
                    $passwork->password_pass = Crypt::decryptString($passwork->password_pass);
                } catch (DecryptException $e) {
                    logger()->error('Error decrypting password: ' . $e->getMessage());
                    return redirect()->route('passgroups.index')->with('error', 'Error al descifrar una de las contraseñas.');
                }
            }

            // Lista de todos los grupos y usuarios para desplegarlos en la vista
            $passgroups = Passgroup::pluck('name', 'id');
            $users = User::pluck('name', 'id');

            return view('passgroup.show', compact('passgroup', 'passworks', 'passgroups', 'users'));
        } catch (Exception $e) {
            logger()->error('Error fetching group: ' . $e->getMessage());
            return redirect()->route('passgroups.index')->with('error', 'Ocurrió un error al obtener el grupo de contraseñas.');
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
        $passgroup = Passgroup::find($id);

        $users = User::pluck('name', 'id');

        return view('passgroup.edit', compact('passgroup', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Passgroup $passgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passgroup $passgroup)
    {
        request()->validate(Passgroup::$rules);

        $passgroup->update($request->all());

        return redirect()->route('passgroups.index')
            ->with('success', 'Passgroup updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $passgroup = Passgroup::find($id)->delete();

        return redirect()->route('passgroups.index')
            ->with('success', 'Passgroup deleted successfully');
    }
}
