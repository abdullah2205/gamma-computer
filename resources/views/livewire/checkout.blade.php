<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cart') }}" class="text-dark">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
            <a href="{{ route('cart') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4">
            <h3>Payment Information</h3>
            <hr>
            <p>Untuk pembayaran pemesanan silahkan Transfer di Rekening dibawah ini sebesar : <strong>Rp. {{ number_format($total_harga)}} </strong></p>
            <div class="media">
                <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
                <div class="media-body">
                    <h5 class="mt-0">BANK BRI</h5>
                    No. Rekening xxxxxx-xxx-xxx atas nama <strong>Muhammad Abdullah</strong>
                </div>
            </div>
        </div>
        <div class="col mt-4 mb-4">
            <h3>Shipping Information</h3>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input wire:model="telepon" id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror"
                        value="{{ old('telepon') }}" autocomplete="name" autofocus>

                    @error('telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
            </form>
        </div>
    </div>
</div>
