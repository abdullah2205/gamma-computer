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
                <a href="{{ route('brands.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('brands.update', $brand->id) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $brand->nama }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" id="logo" name="logo">
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
