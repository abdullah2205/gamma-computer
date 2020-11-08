<?php

namespace App\Http\Livewire;

use App\Models\Pesanan; // import dulu gaes
use App\Models\PesananDetail; // import dulu gaes
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // import dulu gaes

class Cart extends Component
{
    protected $pesanan;
    protected $pesanan_details = []; //berbentuk array
    
    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::find($id); //mencari id pesanan_detail

        if(!empty($pesanan_detail)) {
            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->count(); //hitung pesanan_id yang terhubung pada pesanan_id

            if($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            }else {
                $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->total_harga;
                $pesanan->update();
            }

            $pesanan_detail->delete();
        }

        $this->emit('inCart');

        session()->flash('message', 'Order Deleted');
    }

    public function render()
    {
        if(Auth::user()) { //jika login ambil pesanan dengan user_id
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($this->pesanan) {
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
            }
        }

        return view('livewire.cart', [
            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details
        ]);
    }
}
