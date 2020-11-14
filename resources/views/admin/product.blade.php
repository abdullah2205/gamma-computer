@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
<div class="container">
    @if (count($errors))
        <div class="alert alert-danger">
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li class="m-0 p-0">{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
        {{ $msg }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Form</div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Type</label>
                            <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Table</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <?php $no = 1?>
                            <tr>
                                <td>No.</td>
                                <td>Type</td>
                                <td>Price</td>
                                <td>Brand ID</td>
                                <td>Is Ready</td>
                                <td>Color</td>
                                <td>OS</td>
                                <td>Processor</td>
                                <td>Graphics</td>
                                <td>Display</td>
                                <td>Memory</td>
                                <td>Storage</td>
                                <td>Image</td>
                                <td>Aksi</td>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $product->type }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>{{ $product->is_ready }}</td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->os }}</td>
                                <td>{{ $product->processor }}</td>
                                <td>{{ $product->graphics }}</td>
                                <td>{{ $product->display }}</td>
                                <td>{{ $product->memory }}</td>
                                <td>{{ $product->storage }}</td>
                                <td><img src="{{ url('assets/laptop') }}/{{ $product->image }}" class="img-fluid" width="60"></td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <button type="button" class="btn btn-warning"> Ubah </button>
                                        </a>	
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" >Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection