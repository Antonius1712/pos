@extends('layouts.app')
@section('title')
    User | Barang
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="card-title mb-2">
                Data Barang
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.barang.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah Barang
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" id="kode_barang" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group mt-1">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                        <tr>
                            <td> {{ $barang->kode_barang }} </td>
                            <td> {{ $barang->nama_barang }} </td>
                            <td> {{ $barang->harga_jual }} </td>
                            <td> {{ $barang->stok }} </td>
                            <td> {{ $barang->created_at }} </td>
                            <td> {{ $barang->updated_at }} </td>
                            <td>
                                <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-warning btn-icon">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    
@endsection