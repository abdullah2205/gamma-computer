@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
    <div class="container pt-3 pb-5">

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
                <a href="{{ route('pesanans.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('pesanans.update', $pesanan->id) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="is_ready">Status Pesanan</label>
                                <div class="border border-gray rounded p-1">
                                    @if($pesanan->status == 0)
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status0" value="0" checked="checked">
                                            <label class="form-check-label" for="status0">Cart</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                                            <label class="form-check-label" for="status1">Check Out</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status2" value="2">
                                            <label class="form-check-label" for="status2">Shipping</label>
                                        </div>
                                    @elseif($pesanan->status == 1)
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                                            <label class="form-check-label" for="status0">Cart</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked="checked">
                                            <label class="form-check-label" for="status1">Check Out</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status2" value="2">
                                            <label class="form-check-label" for="status2">Shipping</label>
                                        </div>
                                    @elseif($pesanan->status == 2)
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                                            <label class="form-check-label" for="status0">Cart</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                                            <label class="form-check-label" for="status1">Check Out</label>
                                        </div>
                                        <div class="form-check form">
                                            <input class="form-check-input" type="radio" name="status" id="status2" value="2" checked="checked">
                                            <label class="form-check-label" for="status2">Shipping</label>
                                        </div>
                                    @endif
                                </div>
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
