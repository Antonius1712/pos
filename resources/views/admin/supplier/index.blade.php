@extends('layouts.app')
@section('title')
    User | Supplier
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="card-title mb-2">
                Data Supplier
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.supplier.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah Supplier
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Alamat Supplier</label>
                        <input type="text" name="alamat_supplier" id="alamat_supplier" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" name="nama_sales" id="nama_sales" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Nomor HP Sales</label>
                        <input type="text" name="nomor_hp_sales" id="nomor_hp_sales" class="form-control">
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
                        <th>Nama Supploer</th>
                        <th>Alamat Supplier</th>
                        <th>Nama Sales</th>
                        <th>Nomor HP Sales</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td> {{ $supplier->nama_supplier }} </td>
                            <td> {{ $supplier->alamat_supplier }} </td>
                            <td> {{ $supplier->nama_sales }} </td>
                            <td> {{ $supplier->nomor_hp_sales }} </td>
                            <td>
                                <a href="{{ route('admin.supplier.edit', $supplier->id) }}" class="btn btn-warning btn-icon">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <form action="{{ route('admin.supplier.destroy', $supplier->id) }}" method="post" style="display: inline;">
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