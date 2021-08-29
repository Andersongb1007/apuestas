<?php

namespace App\Http\Livewire\Admin;
use App\Models\Best;
use Livewire\Component;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class BestIndex extends Component
{
    public function render()
    {
        $bests = Best::all();
        return view('livewire.admin.best-index', compact('bests'));
    }
}