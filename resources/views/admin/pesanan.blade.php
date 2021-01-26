@extends('admin.app') <!-- harus di extends dulu gaes -->

@section('content')
<div class="container pb-3 pt-3">
    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
        {{ $msg }}
        </div>
    @elseif ($msg = Session::get('danger'))
        <div class="alert alert-danger">
        {{ $msg }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" style="visibility: hidden" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i> Pesanan
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="border-collapse:collapse;">
                            <caption>List of Pesanan</caption>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                    <th>Kode Unik</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                           <tbody>
                               <?php $no = 1?>
                                @forelse ($users as $no => $user)
                                    <tr data-toggle="collapse" data-target="#data{{ $users->firstItem() + $no }}" class="accordion-toggle data-row"> <!--class="accordion-toggle"-->
                                        <td>{{ $users->firstItem() + $no }}</td>
                                        <td style="display:none" class="id">{{ $user->id }}</td> <!-- ini di hidden -->
                                        <td class="name">{{ $user->name }}</td>
                                        <td class="created_at">{{ $user->created_at }}</td>
                                        <td class="kode_pemesanan">{{ $user->kode_pemesanan }}</td>
                                        <td class="status">
                                            @if($user->status == 0)
                                                <span class="badge badge-warning"><i class="fas fa-shopping-cart"></i> Cart</span>
                                            @elseif($user->status == 1)
                                                <span class="badge badge-success"><i class="fas fa-check"></i> Checkout</span>
                                            @elseif($user->status == 2)
                                                <span class="badge badge-primary"><i class="fas fa-truck"></i> Shipping</span>
                                            @endif
                                        </td>
                                        <td class="total_harga">Rp. {{ number_format($user->total_harga) }}</td>
                                        <td class="kode_unik">{{ $user->kode_unik }}</td>
                                        <td>
                                            <form action="{{ route('pesanans.destroy', $user->id) }}" method="post">
                                                <a href="{{ route('pesanans.edit', $user->id) }}" style="text-decoration: none">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete this Data?')">
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
                        {{ $users->links('layouts/pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection