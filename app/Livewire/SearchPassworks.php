<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Passwork;
use Illuminate\Support\Facades\Auth;

class SearchPassworks extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';


    public function updatingSearch()
    {
        $this->resetPage(); // Resetea la página cuando cambie la búsqueda
    }

    public function render()
    {
        $user = Auth::user();

        $passworks = Passwork::where('user_id', $user->id)
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('livewire.search-passworks', [
            'passworks' => $passworks,
        ]);
    }
}
