<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::paginate(10);
        return view('admin/brand', $data);
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
        $request->validate([
            'nama' => 'required',
            'logo' => 'mimes:jpeg,png,jpg',
        ],
        ['required' => ':attribute harus diisi']);

        $logo = $request->file('logo');
        
        $nama_logo = $logo->hashName();

        $logo->store('public/brand'); //menyimpan gambar ke storage

        Brand::create([
            'nama' => $request->nama,
            'logo' => $nama_logo
        ]);

        return redirect()->route('brands.index')->with('success', 'Data Brand tersimpan');
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
        // $data['brand'] = Brand::find($id);
        // return view('admin/brand_edit', $data);
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
        // $data['brand'] = Brand::find($id);

        // $request->validate([
        //     'nama' => 'required',
        //     'logo' => 'required'
        // ],
        // ['required' => ':attribute harus diisi']);

        // $data['brand']->update($request->all());

        // return redirect()->route('brands.index')->with('success', 'Data Brand terubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::find($id);
        $data->delete();

        return redirect()->route('brands.index')->with('success', 'Data Product telah dihapus');
    }
}
