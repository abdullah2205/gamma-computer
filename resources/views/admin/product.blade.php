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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        Add Product
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
                                @foreach ($products as $no => $product)
                                <tr data-toggle="collapse" data-target="#data{{ $products->firstItem() + $no }}" class="accordion-toggle data-row"> <!--class="accordion-toggle"-->
                                    <td>{{ $products->firstItem() + $no }}</td>
                                    <td class="type">{{ $product->type }}</td>
                                    <td class="price">Rp. {{ number_format($product->price) }}</td>
                                    <td class="brand"><img src="{{ url('assets\brand') }}/{{ $product->brand['logo'] }}" class="img-fluid" width=70></td>
                                    <td class="is_ready">
                                        @if($product->is_ready == 1)
                                            <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stock</span>
                                        @else
                                            <span class="badge badge-danger"><i class="fas fa-times"></i> Not Ready</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            {{--<a href="g" class="btn btn-primary edit">
                                                Ubah
                                            </a>--}}
                                            <button type="button" class="btn btn-primary" id="edit-item">Ubah</button>
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
                                    <label for="type">Type</label>
                                    <input type="text" id="type" class="form-control" name="type" value="{{ old('type') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_ready">Is Ready</label>
                                    <input type="number" id="is_ready" class="form-control" name="is_ready" value="{{ old('is_ready') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" id="color" class="form-control" name="color" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="os">OS</label>
                                    <input type="text" id="os" class="form-control" name="os" value="{{ old('os') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="processor">Processor</label>
                                    <input type="text" id="processor" class="form-control" name="processor" value="{{ old('processor') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="graphics">Graphics</label>
                                    <input type="text" id="graphics" class="form-control" name="graphics" value="{{ old('graphics') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="display">Display</label>
                                    <input type="text" id="display" class="form-control" name="display" value="{{ old('display') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="memory">Memory</label>
                                    <input type="text" id="memory" class="form-control" name="memory" value="{{ old('memory') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="storage" >Storage</label>
                                    <input type="text" id="storage" class="form-control" name="storage" value="{{ old('storage') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="text" id="image" class="form-control" name="image" value="{{ old('image') }}">
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

    <!--Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('products.store') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-type">Type</label>
                                    <input type="text" id="input-type" class="form-control" name="input-type">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-price">Price</label>
                                    <input type="number" id="input-price" class="form-control" name="input-price">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="number" id="input-brand" class="form-control" name="brand_id">
                                    <select class="form-control">
                                        <option value="">Pilih Laptop</option>
                                        @foreach($brands as $brand)
                                            <option class="dropdown-item" value="{{ $brand->nama }}"> {{ $brand->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_ready">Is Ready</label>
                                    <input type="number" id="input-is_ready" class="form-control" name="is_ready">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" id="color" class="form-control" name="color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="os">OS</label>
                                    <input type="text" id="os" class="form-control" name="os">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="processor">Processor</label>
                                    <input type="text" id="processor" class="form-control" name="processor">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="graphics">Graphics</label>
                                    <input type="text" id="graphics" class="form-control" name="graphics">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="display">Display</label>
                                    <input type="text" id="display" class="form-control" name="display">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="memory">Memory</label>
                                    <input type="text" id="memory" class="form-control" name="memory">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="storage" >Storage</label>
                                    <input type="text" id="storage" class="form-control" name="storage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="text" id="image" class="form-control" name="image">
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
    <!-- End Edit Modal -->

    {{-- script --}}
    <script>
        $(document).ready(function() {
          /**
           * for showing edit item popup
           */

          $(document).on('click', "#edit-item", function() {
            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
              'backdrop': 'static'
            };
            $('#editModal').modal(options)
          })

          // on modal show
          $('#editModal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");

            // get the data
            var type = row.children(".type").text();
            var price = row.children(".price").text();
            var brand = row.children(".brand").text();
            var is_ready = row.children(".is_ready").text();
            
            price = price.slice(4);//menghilangkan tanda rupiah
            price = price.replace(/,/g, ''); //menghilangkan tanda koma

            console.log(brand);

            // fill the data in the input fields
            $("#input-type").val(type);
            $("#input-price").val(price);
            $("#input-brand").val(brand);
            $("#input-is_ready").val(is_ready);

          })

          // on modal hide
          $('#editModal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
          })
        })
    </script>
</div>
@endsection