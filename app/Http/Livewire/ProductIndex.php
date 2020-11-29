<?php

namespace App\Http\Livewire;

use App\Models\Product; // import dulu gaes
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('type', 'like', '%'.$this->search.'%')->paginate(12);
        }else {
            $products = Product::paginate(12);
        }
        
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'List Laptop', 
        ]);
    }
}
