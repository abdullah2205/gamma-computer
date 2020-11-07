<?php

namespace App\Http\Livewire;

use App\Models\Brand; // import dulu gaes
use App\Models\Pesanan; // import dulu gaes
use App\Models\PesananDetail; // import dulu gaes
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // import dulu gaes

class Navbar extends Component
{
    public $quantity = 0;

    protected $listeners = [
        'inCart' => 'mount' //mount untuk update keranjang biar realtime
    ];

    public function mount()
    {
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($pesanan) {
                $this->quantity = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else {
                $this->quantity = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'brands' => Brand::all(),
            'order_qty' => $this->quantity,
        ]);
    }
}
