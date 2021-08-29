<?php

namespace App\Http\Livewire;

use App\Models\Sport;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $sports = Sport::all();
        return view('livewire.navigation', compact('sports'));
    }
}