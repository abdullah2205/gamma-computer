@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
    <div class="container pt-5">

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
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Edit Product</div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Type</label>
                              <input type="text" class="form-control" name="type" value="{{ $product->type }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Price</label>
                              <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                          </div>
                      </div>
                  </div>
                      
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Brand</label>
                              <input type="number" class="form-control" name="brand_id" value="{{ $product->brand_id }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Is Ready</label>
                              <input type="number" class="form-control" name="is_ready" value="{{ $product->is_ready }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Color</label>
                              <input type="text" class="form-control" name="color" value="{{ $product->color }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">OS</label>
                              <input type="text" class="form-control" name="os" value="{{ $product->os }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Processor</label>
                              <input type="text" class="form-control" name="processor" value="{{ $product->processor }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Graphics</label>
                              <input type="text" class="form-control" name="graphics" value="{{ $product->graphics }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Display</label>
                              <input type="text" class="form-control" name="display" value="{{ $product->display }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Memory</label>
                              <input type="text" class="form-control" name="memory" value="{{ $product->memory }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Storage</label>
                              <input type="text" class="form-control" name="storage" value="{{ $product->storage }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Image</label>
                              <input type="text" class="form-control" name="image" value="{{ $product->image }}">
                          </div>
                      </div>
                  </div>
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
