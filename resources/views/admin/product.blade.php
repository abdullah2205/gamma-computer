@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
<div class="container pb-3">
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i> Product
                    </button>
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
                                @forelse ($products as $no => $product)
                                    <tr data-toggle="collapse" data-target="#data{{ $products->firstItem() + $no }}" class="accordion-toggle data-row"> <!--class="accordion-toggle"-->
                                        <td>{{ $products->firstItem() + $no }}</td>
                                        <td style="display:none" class="id">{{ $product->id }}</td> <!-- ini di hidden -->
                                        <td class="type">{{ $product->type }}</td>
                                        <td class="price">Rp. {{ number_format($product->price) }}</td>
                                        <td class="brand"><img src="{{ url('storage\brand') }}/{{ $product->brand['logo'] }}" class="img-fluid" width=70></td>
                                        <td class="is_ready">
                                            @if($product->is_ready == 1)
                                                <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stock</span>
                                            @else
                                                <span class="badge badge-danger"><i class="fas fa-times"></i> Not Ready</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                <a href="{{ route('products.edit', $product->id) }}" style="text-decoration: none">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
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
                                                            <tr>
                                                                <th>Image</th>
                                                                <td>:</td>
                                                                <td>{{ $product->image }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <img src="{{ url('storage/laptop') }}/{{ $product->image }}" class="img-fluid" width="320">
                                                    </div>
                                                </div>
                                            </div> 
                                        </td> 
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" align="center"> Empty Data</td>
                                    </tr>
                                @endforelse
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
        <div class="modal-dialog modal-xl" role="document">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" id="type" class="form-control" name="type" value="{{ old('type') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" id="brand_id"  name="brand_id">
                                        <option value="">Pilih Brand</option>
                                        @foreach($brands as $brand)
                                            <option class="dropdown-item" name="brand_id" value="{{ $brand->id }}"> {{ $brand->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="is_ready">Product Stock</label>
                                    <div class="border border-gray rounded p-1">
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready1" value="1">
                                            <label class="form-check-label" for="is_ready1">Ready Stock</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready0" value="0">
                                            <label class="form-check-label" for="is_ready0">Not Ready</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" id="color" class="form-control" name="color" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="os">OS</label>
                                    <input type="text" id="os" class="form-control" name="os" value="{{ old('os') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="processor">Processor</label>
                                    <input type="text" id="processor" class="form-control" name="processor" value="{{ old('processor') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="graphics">Graphics</label>
                                    <input type="text" id="graphics" class="form-control" name="graphics" value="{{ old('graphics') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="display">Display</label>
                                    <input type="text" id="display" class="form-control" name="display" value="{{ old('display') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="memory">Memory</label>
                                    <input type="text" id="memory" class="form-control" name="memory" value="{{ old('memory') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="storage" >Storage</label>
                                    <input type="text" id="storage" class="form-control" name="storage" value="{{ old('storage') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Close
                        </button>
                        <button class="btn btn-success">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Add Modal -->
</div>
@endsection