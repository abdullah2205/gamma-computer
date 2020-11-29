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
                            <td>No.</td>
                            <td>Tanggal Pesanan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Price</strong></td>
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
                                        <img src="{{ url('assets/laptop') }}/{{ $pesanan_detail->product->image }}" class="img-fluid" width="50">
                                        {{ $pesanan_detail->product->type }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan->status == 1)
                                        Belum Lunas
                                    @elseif($pesanan->status == 2)
                                        Lunas
                                    @else
                                        Dikirim
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
                            <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
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
