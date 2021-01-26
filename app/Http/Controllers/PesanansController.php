<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join 2 table
        $data['users'] = User::Join('pesanans', 'users.id', '=', 'pesanans.user_id')
                ->select('users.name','pesanans.*')
                ->paginate(10);

        return view('admin/pesanan', $data);
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
        $data['pesanan'] = Pesanan::find($id);
        return view('admin/pesanan_edit', $data);
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
        $data['pesanan'] = Pesanan::find($id);

        $request->validate([
            'status' => 'required'
        ],
        ['required' => ':attribute harus diisi']);

        $data['pesanan']->update($request->all());

        return redirect()->route('pesanans.index')->with('success', 'Data Pesanan telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pesanan::find($id);
        $id = $data->id;
        $value = PesananDetail::where('pesanan_id', $id)->get()->count();
        if($value < 1 )
        {
            $data->delete();
            return redirect()->route('pesanans.index')->with('success', 'Data Pesanan telah dihapus');
        }
        else{
            return redirect()->route('pesanans.index')->with('danger', 'Data Pesanan memiliki relasi Data Pesanan Detail');
        }
    }
}
