@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
<div class="container pb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" style="visibility: hidden" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i> Pesanan
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="border-collapse:collapse;">
                            <caption>List of Pesanan</caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Product</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Total Harga</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                           <tbody>
                               <?php $no = 1?>
                                @forelse ($products as $no => $product)
                                    <tr data-toggle="collapse" data-target="#data{{ $products->firstItem() + $no }}" class="accordion-toggle data-row"> <!--class="accordion-toggle"-->
                                        <td>{{ $products->firstItem() + $no }}</td>
                                        <td style="display:none" class="id">{{ $product->id }}</td> <!-- ini di hidden -->
                                        <td class="kode_pemesanan">{{ $product->kode_pemesanan }}</td>
                                        <td class="type">{{ $product->type }}</td>
                                        <td class="jumlah_pesanan">{{ $product->jumlah_pesanan }}</td>
                                        <td class="total_harga">Rp. {{ number_format($product->total_harga) }}</td>
                                        <td>
                                            <form action="{{ route('pesanan_details.destroy', $product->id) }}" method="post">
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete this Data?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" align="center"> Empty Data</td>
                                    </tr>
                                @endforelse
                           </tbody>
                        </table>
                        {{ $products->links('layouts/pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection