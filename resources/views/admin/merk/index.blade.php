@extends('layouts.app')
@section('title')
    User | Merk
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="card-title mb-2">
                Data Merk
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.merk.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah Merk
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Kode Merk</label>
                        <input type="text" name="kode_merk" id="kode_merk" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Nama Merk</label>
                        <input type="text" name="nama_merk" id="nama_merk" class="form-control">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($merks as $merk)
                        <tr>
                            <td> {{ $merk->kode_merk }} </td>
                            <td> {{ $merk->nama_merk }} </td>
                            <td>
                                <a href="{{ route('admin.merk.edit', $merk->id) }}" class="btn btn-warning btn-icon">
                                    <i class="feather icon-edit"></i>
                                </a>
                                <form action="{{ route('admin.merk.destroy', $merk->id) }}" method="post" style="display: inline;">
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