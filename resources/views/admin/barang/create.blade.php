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
            <form action="{{ route('admin.barang.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase">kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                        <option value="">-- Pilih --</option>
                        @forelse ($kategori as $key => $val)
                            <option {{ $val->id == ($barang->kategori_id ?? old('kategori_id')) ? 'selected' : '' }} data-kode="{{ $val->kode_kategori }}" value="{{ $val->id }}"> {{ $val->kode_kategori }} - {{ $val->nama_kategori }} </option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('kategori_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">merk</label>
                    <select name="merk_id" id="merk_id" class="form-control @error('merk_id') is-invalid @enderror">
                        <option value="">-- Pilih --</option>
                        @forelse ($merk as $key => $val)
                            <option {{ $val->id == ($barang->merk_id ?? old('merk_id')) ? 'selected' : '' }} data-kode="{{ $val->kode_merk }}" value="{{ $val->id }}"> {{ $val->kode_merk }} - {{ $val->nama_merk }} </option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('merk_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                        <option value="">-- Pilih --</option>
                        @forelse ($supplier as $key => $val)
                            <option {{ $val->id == ($barang->supplier_id ?? old('supplier_id')) ? 'selected' : '' }} value="{{ $val->id }}"> {{ $val->nama_supplier }} </option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('supplier_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama barang</label>
                    <input value="{{ $barang->nama_barang ?? old('nama_barang') }}" name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang">
                    @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">harga beli</label>
                    <input value="{{ $barang->harga_beli ?? old('harga_beli') }}" name="harga_beli" type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli">
                    @error('harga_beli')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">harga jual</label>
                    <input value="{{ $barang->harga_jual ?? old('harga_jual') }}" name="harga_jual" type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual">
                    @error('harga_jual')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">stok</label>
                    <input value="{{ $barang->stok ?? old('stok') }}" name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" id="stok">
                    @error('stok')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase">satuan</label>
                    <input value="{{ $barang->satuan ?? old('satuan') }}" name="satuan" type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan">
                    @error('satuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @php( $err = '' )
    @error('err')
        @php(
            $err = $message
        )
    @enderror
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('select').select2();
    });
</script>
@endsection