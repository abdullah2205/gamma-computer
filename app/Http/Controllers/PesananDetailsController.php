<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesananDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join 3 table
        $data['products'] = Product::Join('pesanan_details', 'products.id', '=', 'pesanan_details.product_id')
            ->Join('pesanans', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->select('products.type','pesanan_details.*', 'pesanans.kode_pemesanan')
            ->paginate(10);

        return view('admin/pesanan_detail', $data);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PesananDetail::find($id);
        $data->delete();

        return redirect()->route('pesanan_details.index')->with('success', 'Data Pesanan Detail telah dihapus');
    }
}
