@extends('layouts.app')
@section('title')
    User | User
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="card-title mb-2">
                Data User
            </div>
            <div class="mb-2">
                <a href="{{ route('admin.user.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah User
                </a>
            </div>
        </div>
        <div class="card-body">
            
        </div>
    </div>
@endsection
@section('script')
    
@endsection