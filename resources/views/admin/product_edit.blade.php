@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
    <div class="container pt-3 pb-4">

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
                <a href="{{ route('products.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Type</label>
                              <input type="text" class="form-control" name="type" value="{{ $product->type }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Price</label>
                              <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select class="form-control" id="brand_id"  name="brand_id">
                                <option value="">Pilih Brand</option>
                                @foreach($brands as $brand)
                                    <option class="dropdown-item" name="brand_id" value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}> {{ $brand->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="is_ready">Product Stock</label>
                                <div class="border border-gray rounded p-1">
                                    @if($product->is_ready == 1)
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready1" value="1" checked="checked">
                                            <label class="form-check-label" for="is_ready1">Ready Stock</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready0" value="0">
                                            <label class="form-check-label" for="is_ready0">Not Ready</label>
                                        </div>
                                    @else
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready1" value="1">
                                            <label class="form-check-label" for="is_ready1">Ready Stock</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="is_ready" id="is_ready0" value="0" checked="checked">
                                            <label class="form-check-label" for="is_ready0">Not Ready</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                  </div>
                      
                  <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Color</label>
                              <input type="text" class="form-control" name="color" value="{{ $product->color }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">OS</label>
                              <input type="text" class="form-control" name="os" value="{{ $product->os }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Processor</label>
                            <input type="text" class="form-control" name="processor" value="{{ $product->processor }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Graphics</label>
                            <input type="text" class="form-control" name="graphics" value="{{ $product->graphics }}">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Display</label>
                              <input type="text" class="form-control" name="display" value="{{ $product->display }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Memory</label>
                              <input type="text" class="form-control" name="memory" value="{{ $product->memory }}">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Storage</label>
                            <input type="text" class="form-control" name="storage" value="{{ $product->storage }}">
                        </div>
                    </div>
                    <div class="col-md-3" style="display:none">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="text" class="form-control" name="image" value="{{ $product->image }}">
                        </div>
                    </div>
                  </div>
                    <button class="btn btn-success float-right">
                        <i class="fas fa-save"></i> Save
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
