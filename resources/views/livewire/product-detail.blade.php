<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Laptop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Laptop Detail</li>
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
        <div class="col-md-6">
            <div class="card gambar-product border-secondary">
                <div class="card-body">
                    <img src="{{ url('assets/laptop') }}/{{ $product->image }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <h3>
                <strong>{{ $product->type }}</strong>
            </h3>
            <h4>
                Rp. {{ number_format($product->price) }}
                @if($product->is_ready == 1)
                    <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stock</span>
                @else
                    <span class="badge badge-danger"><i class="fas fa-times"></i> Not Ready</span>
                @endif
            </h4>
            <div class="row mt-3">
                <div class="col">
                    <form wire:submit.prevent="addToCard">
                        <table class="table table-borderless">
                            <tr>
                                <td> Brand </td>
                                <td>:</td>
                                <td>
                                    <img src="{{ url('assets\brand') }}/{{ $product->brand['logo'] }}" class="img-fluid" width=60>
                                </td>
                            </tr>
                            <tr>
                                <td> Color </td>
                                <td>:</td>
                                <td>
                                    {{ $product->color }}
                                </td>
                            </tr>
                            <tr>
                                <td> Operating System </td>
                                <td>:</td>
                                <td>
                                    {{ $product->os }}
                                </td>
                            </tr>
                            <tr>
                                <td> Processor </td>
                                <td>:</td>
                                <td>
                                    {{ $product->processor }}
                                </td>
                            </tr>
                            <tr>
                                <td> Graphic Card </td>
                                <td>:</td>
                                <td>
                                    {{ $product->graphics }}
                                </td>
                            </tr>
                            <tr>
                                <td> Display Resolution </td>
                                <td>:</td>
                                <td>
                                    {{ $product->display }}
                                </td>
                            </tr>
                            <tr>
                                <td> Memory </td>
                                <td>:</td>
                                <td>
                                    {{ $product->memory }}
                                </td>
                            </tr>
                            <tr>
                                <td> Storage </td>
                                <td>:</td>
                                <td>
                                    {{ $product->storage }}
                                </td>
                            </tr>
                            <tr>
                                <td> Order Quantity </td>
                                <td>:</td>
                                <td>
                                    <input wire:model="order_qty" id="order_qty" type="number" min="1"
                                    class="form-control @error('order_qty') is-invalid @enderror"
                                     value="{{ old('order_qty') }}" autofocus>

                                    @error('order_qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-success btn-block" @if($product->is_ready != 1) disabled @endif><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
