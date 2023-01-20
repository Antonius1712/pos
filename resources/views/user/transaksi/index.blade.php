@extends('layouts.app')
@section('title')
    
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="card-title mb-2">
                List Transaksi
            </div>
            <div class="mb-2">
                <a href="{{ route('user.transaksi.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah Transaksi
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Pelanggan </th>
                        <th> Diskon </th>
                        <th> Total Harga </th>
                        <th> Total Bayar </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Transaksi as $val)
                        <tr>
                            <td> {{ $val->pelanggan_id }} </td>
                            <td> {{ $val->diskon }} </td>
                            <td> {{ $val->total_harga }} </td>
                            <td> {{ $val->total_bayar }} </td>
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