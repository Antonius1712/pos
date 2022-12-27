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
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
    
@endsection