@extends('layouts.app')
@section('title')
    User | Merk
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <div class="card-title mb-2">
                Data Merk
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.merk.index') }}" class="btn btn-white" style="vertical-align: middle;">
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.merk.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase">kode merk</label>
                    <input name="kode_merk" type="text" class="form-control" id="kode_merk">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama merk</label>
                    <input name="nama_merk" type="text" class="form-control" id="nama_merk">
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