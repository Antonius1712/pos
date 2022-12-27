@extends('layouts.app')
@section('title')
    User | Supplier
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <div class="card-title mb-2">
                Data Supplier
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.supplier.index') }}" class="btn btn-white" style="vertical-align: middle;">
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.supplier.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase">nama supplier</label>
                    <input name="nama_supplier" type="text" class="form-control" id="nama_supplier">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">alamat supplier</label>
                    <input name="alamat_supplier" type="text" class="form-control" id="alamat_supplier">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama sales</label>
                    <input name="nama_sales" type="text" class="form-control" id="nama_sales">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nomor hp sales</label>
                    <input name="nomor_hp_sales" type="text" class="form-control" id="nomor_hp_sales">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    
@endsection