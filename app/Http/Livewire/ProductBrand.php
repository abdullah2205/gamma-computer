<?php

namespace App\Http\Livewire;

use App\Models\Brand; // import dulu gaes
use App\Models\Product; // import dulu gaes
use Livewire\Component;
use Livewire\WithPagination;

class ProductBrand extends Component
{
    use WithPagination;

    public $search, $brand;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($brandId)
    {
        $brandDetail = Brand::find($brandId);

        if($brandDetail) {
            $this->brand = $brandDetail;
        }
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('brand_id', $this->brand->id)->where('type', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $products = Product::where('brand_id', $this->brand->id)->paginate(8);
        }
        
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Product Brand '.$this->brand->nama,
        ]);
    }
}
