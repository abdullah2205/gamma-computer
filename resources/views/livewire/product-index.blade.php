<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Laptop</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-2">
                <input wire:model="search" type="text" class="form-control border-primary" placeholder="Search . . ." aria-label="Search"
                    aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text border-primary bg-primary text-white rounded-right" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <section class="products">
        <div class="row mt-4">
            @foreach($products as $product)
                <div class="col-md-2 col-sm-4 mb-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/laptop') }}/{{ $product->image }}" class="img-fluid" width="160">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h6 class="max"><strong>{{ $product->type }}</strong> </h6>
                                    <h6> {{ $product -> processor }}</h6>
                                    <hr>
                                    <h6 class="text-primary"><strong>Rp. {{ number_format($product->price) }}</strong></h6>
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
        <div class="row">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</div>