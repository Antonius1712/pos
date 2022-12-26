@extends('layouts.app')
@section('title')
    
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card-columns">
        <a href="{{ route('user.barang.index') }}">
            <div class="card bg-primary">
                <div class="card-body text-white text-center" style="font-size: 48px; margin-top: 25%; margin-bottom: 25%;">
                    <i class="feather icon-package"></i>
                    Barang
                </div>
            </div>
        </a>
        <a href="">
            <div class="card bg-primary">
                <div class="card-body text-white text-center" style="font-size: 48px; margin-top: 25%; margin-bottom: 25%;">
                    <i class="feather icon-shopping-cart"></i>
                    Transaksi
                </div>
            </div>
        </a>
        <a href="">
            <div class="card bg-primary">
                <div class="card-body text-white text-center" style="font-size: 48px; margin-top: 25%; margin-bottom: 25%;">
                    <i class="feather icon-users"></i>
                    User
                </div>
            </div>
        </a>
    </div>
@endsection
@section('script')
    
@endsection