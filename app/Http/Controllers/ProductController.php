<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(10);
        $data['brands'] = Brand::all();
        return view('admin/product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('image'));
        $request->validate([
            'type' => 'required', //dari name form
            'price' => 'required',
            'brand_id' => 'required',
            'is_ready' => 'required',
            'color' => 'required',
            'os' => 'required',
            'processor' => 'required',
            'graphics' => 'required',
            'display' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ],
        ['required' => ':attribute harus diisi']);

        //Product::create($request->all());
        $gambar = $request->file('image');
        
        // $nama_gambar = $gambar->getClientOriginalName();
        $nama_gambar = $gambar->hashName();

        $gambar->store('public/laptop'); //menyimpan gambar ke storage

        Product::create([
            'type' => $request->type, 
            'price' => $request->price, 
            'brand_id' => $request->brand_id, 
            'is_ready' => $request->is_ready, 
            'color' => $request->color, 
            'os' => $request->os, 
            'processor' => $request->processor, 
            'graphics' => $request->graphics, 
            'display' => $request->display, 
            'memory' => $request->memory, 
            'storage' => $request->storage, 
            'image' => $nama_gambar
        ]);

        return redirect()->route('products.index')->with('success', 'Data Product tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['brands'] = Brand::all();
        return view('admin/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['product'] = Product::find($id);

        //dd($data['product']);
        $request->validate([
            'type' => 'required', //dari name form
            'price' => 'required',
            'brand_id' => 'required',
            'is_ready' => 'required',
            'color' => 'required',
            'os' => 'required',
            'processor' => 'required',
            'graphics' => 'required',
            'display' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'image' => 'required'
        ],
        ['required' => ':attribute harus diisi']);

        $data['product']->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data Product terubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Product::find($id);
        $users->delete();

        return redirect()->route('products.index')->with('success', 'Data Product telah dihapus');
    }
}
