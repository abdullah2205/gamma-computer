<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
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
                            <th>No.</th>
                            <th>Tanggal Pesanan</th>
                            <th>Kode Pemesanan</th>
                            <th>Pesanan</th>
                            <th>Status</th>
                            <th><strong>Total Price</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @guest
                            <tr>
                                <td colspan="12" align="center"> Empty Data</td>
                            </tr>
                        @else
                            <?php $no = 1?>
                            @forelse($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan}}</td>
                                <td>
                                    <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <img src="{{ url('storage/laptop') }}/{{ $pesanan_detail->product->image }}" class="img-fluid" width="50">
                                        {{ $pesanan_detail->product->type }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan->status == 1)
                                        <span class="badge badge-success"><i class="fas fa-check"></i> Checkout</span> 
                                    @elseif($pesanan->status == 2)
                                        <span class="badge badge-primary"><i class="fas fa-truck"></i> Shipping</span>
                                    @endif
                                </td>
                                <td><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" align="center"> Empty Data</td>
                            </tr>
                            @endforelse
                        @endguest
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @guest
        <div></div>
    @else
        <div class="row">
            <div class="col mb-4">
                <div class="card shadow history">
                    <div class="card-body">
                        <p>Untuk pembayaran pemesanan Transfer di Rekening dibawah ini : </p>
                        <div class="media">
                            <img class="mr-3" src="{{ url('storage/bri.png') }}" alt="Bank BRI" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">BANK BRI</h5>
                                No. Rekening xxxxxx-xxx-xxx atas nama <strong>Muhammad Abdullah</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
