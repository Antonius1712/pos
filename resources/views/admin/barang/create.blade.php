@extends('layouts.app')
@section('title')
    User | Barang
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <div class="card-title mb-2">
                Data Barang
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.barang.index') }}" class="btn btn-white" style="vertical-align: middle;">
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="text-uppercase">kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <option value="">-- Pilih --</option>
                </select>
            </div>
            <div class="form-group">
                <label class="text-uppercase">merk</label>
                <select name="merk_id" id="merk_id" class="form-control">
                    <option value="">-- Pilih --</option>
                </select>
            </div>
            <div class="form-group">
                <label class="text-uppercase">supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="">-- Pilih --</option>
                </select>
            </div>
            <div class="form-group">
                <label class="text-uppercase">kode barang</label>
                <input name="kode_barang" type="text" class="form-control" id="kode_barang" readonly>
            </div>
            <div class="form-group">
                <label class="text-uppercase">harga beli</label>
                <input name="harga_beli" type="number" class="form-control" id="harga_beli">
            </div>
            <div class="form-group">
                <label class="text-uppercase">harga jual</label>
                <input name="harga_jual" type="number" class="form-control" id="harga_jual">
            </div>
            <div class="form-group">
                <label class="text-uppercase">stok</label>
                <input name="stok" type="number" class="form-control" id="stok">
            </div>
            <div class="form-group">
                <label class="text-uppercase">satuan</label>
                <input name="satuan" type="text" class="form-control" id="satuan">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection