<?php

namespace App\Http\Livewire;

use App\Models\Product; // import dulu gaes
use App\Models\Pesanan; // import dulu gaes
use App\Models\PesananDetail; // import dulu gaes
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // import dulu gaes

class ProductDetail extends Component
{
    public $product, $order_qty;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function addToCard()
    {
        $this->validate([
            'order_qty' => 'required'
        ]);

        //validasi jika belum login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $total_harga = $this->order_qty*$this->product->price;

        //apakah user punya pesanan utama ys status nya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //menyimpan atau update data pesanan utama
        if(empty($pesanan))
        {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'kode_unik' => mt_rand(100, 999), //untuk membuat kode unik
                'total_harga' => $total_harga,
                'status' => 0,
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'GM-'.$pesanan->id;
            $pesanan->update();

        } 
        else {
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        //menyimpan pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->order_qty,
            'total_harga' => $total_harga
        ]);

        $this->emit('inCart');
        
        session()->flash('message', 'Success add to Cart');
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.product-detail');
    }
}
