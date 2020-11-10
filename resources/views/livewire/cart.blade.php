<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{  session('message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td width="200">Image</td>
                            <td width="250">Type Laptop</td>
                            <td>Price</td>
                            <td width="100">Total Order</td>
                            <td align="right"><strong>Total Price</strong></td>
                            <td align="center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1?>
                        @forelse($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('assets/laptop') }}/{{ $pesanan_detail->product['image'] }}" class="img-fluid">
                                </td>
                                <td>{{ $pesanan_detail->product['type'] }}</td>
                                <td> Rp. {{ number_format($pesanan_detail->product['price']) }}</td>
                                <td>{{ $pesanan_detail->jumlah_pesanan }}</td=>
                                <td align="right"><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong></td>
                                <td align="center">
                                    <i wire:click="destroy({{ $pesanan_detail->id }})" class="fas fa-trash text-danger"></i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" align="center"> Empty Data</td>
                            </tr>
                        @endforelse

                        @if(!empty($pesanan))
                            <tr align="right">
                                <td colspan="5"><strong>Total Price : </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr align="right">
                                <td colspan="5"><strong>Uniqe Code : </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->kode_unik) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr align="right">
                                <td colspan="5"><strong>Yang harus Dibayar : </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td align="right">
                                    <a href="{{ route('checkout') }}" class="btn btn-success">
                                        <i class="fas fa-arrow-right"></i> Check Out
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
