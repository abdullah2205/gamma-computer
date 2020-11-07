
<div class="container">
    <div class="jumbotron jumbotron-fluid bg-info shadow">
      <div class="container p-4">
        <h1>Gamma <strong>Computer</strong></h1>
        <hr>
        <h4>Toko Komputer Terlengkap dan Berkualitas</h4>
        <h4>Tinggal <strong> Klik, Bayar,</strong> dan langsung <strong>Antar</strong></h4>
      </div>
    </div>
    
    {{-- BRAND --}}
    <section class="pilih-brand mt-5">
        <h3><strong>Pilih Brand</strong></h3>
        <div class="row mt-4">
            @foreach($brands as $brand)
            <div class="col">
                <a href=" {{ route('products.brand', $brand->id) }} ">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <img src="{{ url('assets\brand') }}/{{ $brand -> logo }}" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- LAPTOP --}}
    <section class="products mt-5">
        <h3>
            <strong>Best Laptop</strong>
            <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua </a>
        </h3>
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col mb-4 d-flex">
                <div class="card border border-secondary flex-fill">
                    <div class="card-body text-center">
                        <img src="{{ url('assets\laptop') }}/{{ $product -> image }}" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong> {{ $product -> type }} </strong></h5>
                                <h6> {{ $product -> os }}</h6>
                                <h6> {{ $product -> processor }}</h6>
                                <h6> {{ $product -> memory }}</h6>
                                <hr>
                                <h5>Rp. {{ number_format($product -> price) }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>