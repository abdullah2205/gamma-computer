<?php

namespace App\Http\Livewire;

use App\Models\User; // import dulu gaes
use App\Models\Pesanan; // import dulu gaes
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // import dulu gaes

class Checkout extends Component
{
    public $total_harga, $telepon, $alamat;

    public function mount()
    {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->telepon = Auth::user()->telepon; //untuk menampilkan data pengiriman 
        $this->alamat = Auth::user()->alamat; //untuk menampilkan data pengiriman 

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($pesanan)){
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $this->validate([
            'telepon' => 'required',
            'alamat' => 'required'
        ]);
        
        //simpan telepon dan alamat
        $user = User::where('id', Auth::user()->id)->first();
        $user->telepon = $this->telepon;
        $user->alamat = $this->alamat;
        $user->update();

        //update data pesanan (status)
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $this->emit('inCart');

        session()->flash('message', "Checkout Success");

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
