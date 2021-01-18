<div class="container">
    {{-- cobak carousel --}}
    <div id="carousel" class="carousel slide carousel-fade mb-4" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100 slide" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
                    alt="First slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h2>Gamma <strong>Computer</strong></h2>
                    <h4>Toko Komputer Terlengkap dan Berkualitas</h4>
                    <h4>Tinggal <strong> Klik, Bayar,</strong> dan langsung <strong>Antar</strong></h4>
                </div>
            </div>
            <div class="carousel-item">
                <div class="view">
                    <img class="d-block w-100 slide" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
                    alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Strong mask</h3>
                    <p>Secondary text</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="view">
                    <img class="d-block w-100 slide" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
                    alt="Third slide">
                    <div class="mask rgba-black-slight"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">Slight mask</h3>
                    <p>Third text</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- BRAND --}}
    <section class="pilih-brand">
        <h3><strong>Pilih Brand</strong></h3>
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-md-2 col-sm-6 mt-4">
                    <a href=" {{ route('products.brand', $brand->id) }} ">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <img src="{{ url('storage\brand') }}/{{ $brand -> logo }}" class="img-fluid">
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
            <a href="{{ route('products') }}" class="btn btn-success float-right"><i class="fas fa-eye"></i> Lihat Semua </a>
        </h3>
        <div class="row mt-4">
            @foreach($products as $product)
                <div class="col-md-2 col-sm-4 mb-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body text-center">
                            <img src="{{ url('storage\laptop') }}/{{ $product -> image }}" class="gambar img-fluid">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h6 class="max"><strong>{{ $product -> type }} </strong></h6>
                                    <h6> {{ $product -> processor }}</h6>
                                    <hr>
                                    <h6 class="text-primary"><strong>Rp. {{ number_format($product -> price) }}</strong></h6>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="{{ route('products.detail', $product->id) }}" class="btn btn-success btn-block"><i class="fas fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>