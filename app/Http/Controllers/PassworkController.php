<?php

namespace App\Http\Controllers;

use App\Models\Passwork;
use App\Models\Passgroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');

            $passworks = Passwork::where('name', 'LIKE', $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Cambia el número según tus necesidades
        } else {
            $passworks = Passwork::orderBy('created_at', 'desc') // Ordena de forma descendente por fecha de creación
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

        $passgroups = Passgroup::pluck('name','id');

        $users = User::pluck('name','id');

        return view('passwork.create', compact('passwork','passgroups','users'));
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

        $passwork = Passwork::create($request->all());

        return redirect()->route('passworks.index')
            ->with('success', 'Passwork created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passwork = Passwork::find($id);

        $passgroups = Passgroup::pluck('name','id');
        
        $users = User::pluck('name','id');

        return view('passwork.show', compact('passwork','passgroups','users'));
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

        $passgroups = Passgroup::pluck('name','id');
        
        $users = User::pluck('name','id');


        return view('passwork.edit', compact('passwork','passgroups','users'));
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

        $passwork->update($request->all());

        return redirect()->route('passworks.index')
            ->with('success', 'Passwork updated successfully');
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
