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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                            Add Product
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="border-collapse:collapse;">
                            <caption>List of Products</caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th width="350">Type</th>
                                    <th>Price</th>
                                    <th>Brand</th>
                                    <th>Stock</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                           <tbody>
                               <?php $no = 1?>
                                @foreach ($products as $no => $product)
                                <tr data-toggle="collapse" data-target="#data{{ $products->firstItem() + $no }}" class="accordion-toggle"> <!--class="accordion-toggle"-->
                                    <td>{{ $products->firstItem() + $no }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>Rp. {{ number_format($product->price) }}</td>
                                    <td><img src="{{ url('assets\brand') }}/{{ $product->brand['logo'] }}" class="img-fluid" width=70></td>
                                    <td>
                                        @if($product->is_ready == 1)
                                            <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stock</span>
                                        @else
                                            <span class="badge badge-danger"><i class="fas fa-times"></i> Not Ready</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            <a href="g" class="btn btn-primary edit">
                                                Ubah
                                            </a>	
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" >Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="hiddenRow">
                                        <div class="accordian-body collapse p-4" id="data{{ $products->firstItem() + $no }}">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <table>
                                                        <tr>
                                                            <th>Color</th>
                                                            <td>:</td>
                                                            <td>{{ $product->color }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Operating Sistem</th>
                                                            <td>:</td>
                                                            <td>{{ $product->os }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Processor</th>
                                                            <td>:</td>
                                                            <td>{{ $product->processor }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Graphics</th>
                                                            <td>:</td>
                                                            <td>{{ $product->graphics }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Display</th>
                                                            <td>:</td>
                                                            <td>{{ $product->display }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Memory</th>
                                                            <td>:</td>
                                                            <td>{{ $product->memory }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Storage</th>
                                                            <td>:</td>
                                                            <td>{{ $product->storage }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="{{ url('assets/laptop') }}/{{ $product->image }}" class="img-fluid" width="320">
                                                </div>
                                            </div>
                                        </div> 
                                    </td> 
                                </tr>
                                @endforeach
                           </tbody>
                        </table>
                        {{ $products->links('layouts/pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('products.store') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <input type="number" class="form-control" name="brand_id" value="{{ old('brand_id') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Is Ready</label>
                                    <input type="number" class="form-control" name="is_ready" value="{{ old('is_ready') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="text" class="form-control" name="color" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">OS</label>
                                    <input type="text" class="form-control" name="os" value="{{ old('os') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Processor</label>
                                    <input type="text" class="form-control" name="processor" value="{{ old('processor') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Graphics</label>
                                    <input type="text" class="form-control" name="graphics" value="{{ old('graphics') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Display</label>
                                    <input type="text" class="form-control" name="display" value="{{ old('display') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Memory</label>
                                    <input type="text" class="form-control" name="memory" value="{{ old('memory') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Storage</label>
                                    <input type="text" class="form-control" name="storage" value="{{ old('storage') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="text" class="form-control" name="image" value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add Modal -->
</div>
@endsection