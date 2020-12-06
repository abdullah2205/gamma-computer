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
                <div class="card-header">Data Table</div>
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
                                            <a href="{{ route('products.edit', $product->id) }}">
                                                <button type="button" class="btn btn-primary"> Ubah </button>
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
</div>
@endsection