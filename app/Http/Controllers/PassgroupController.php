<?php

namespace App\Http\Controllers;

use App\Models\Passgroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $passgroups = Passgroup::paginate();

        $users = User::pluck('name','id');

        return view('passgroup.index', compact('passgroups','users'))
            ->with('i', (request()->input('page', 1) - 1) * $passgroups->perPage());
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

        $users = User::pluck('name','id');

        return view('passgroup.create', compact('passgroup','users'));
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
        $passgroup = Passgroup::find($id);

        $users = User::pluck('name','id');

        return view('passgroup.show', compact('passgroup', 'users'));
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
        
        $users = User::pluck('name','id');

        return view('passgroup.edit', compact('passgroup','users'));
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
