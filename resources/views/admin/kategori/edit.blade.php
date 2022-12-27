@extends('layouts.app')
@section('title')
    User | Kategori
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <div class="card-title mb-2">
                Data Kategori
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-white" style="vertical-align: middle;">
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="text-uppercase">kode kategori</label>
                    <input value="{{ $kategori->kode_kategori }}" name="kode_kategori" type="text" class="form-control" id="kode_kategori">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama kategori</label>
                    <input value="{{ $kategori->nama_kategori }}" name="nama_kategori" type="text" class="form-control" id="nama_kategori">
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