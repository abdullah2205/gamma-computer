<?php

namespace App\Http\Livewire;

use App\Models\Pesanan; // import dulu gaes
use App\Models\PesananDetail; // import dulu gaes
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // import dulu gaes

class History extends Component
{
    public $pesanans;

    public function render()
    {
        if(Auth::user()) {
            $this->pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        } 

        return view('livewire.history');
    }
}
