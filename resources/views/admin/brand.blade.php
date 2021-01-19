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
                        <i class="fas fa-plus"></i> Brand
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="border-collapse:collapse;">
                            <caption>List of Brands</caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th width="350">Brands</th>
                                    <th>Logo</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1?>
                                    @forelse ($brands as $no => $brand)
                                        <tr data-toggle="collapse" data-target="#data{{ $brands->firstItem() + $no }}" class="accordion-toggle data-row"> <!--class="accordion-toggle"-->
                                            <td>{{ $brands->firstItem() + $no }}</td>
                                            <td style="display:none" class="id">{{ $brand->id }}</td> <!-- ini di hidden -->
                                            <td class="nama">{{ $brand->nama }}</td>
                                            <td class="logo"><img src="{{ url('storage\brand') }}/{{ $brand->logo }}" class="img-fluid" width=70></td>
                                            <td>
                                                <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" align="center"> Empty Data</td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        {{ $brands->links('layouts/pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" >Nama</label>
                                    <input type="text" id="nama" class="form-control" name="nama" value="{{ old('nama') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" id="logo" name="logo">
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