@extends('layouts.app')
@section('title')
    User | Barang
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <p>Barang</p>
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" id="kode_barang" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-2">
                    <div class="form-group mt-1">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $barang)
                            <tr>
                                <td> {{ $barang->kode_barang }} </td>
                                <td> {{ $barang->nama_barang }} </td>
                                <td> {{ $barang->harga_jual }} </td>
                                <td> {{ $barang->stok }} </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4"> Empty </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.zero-configuration').dataTable({
            "bLengthChange": false,
            "lengthMenu": [4],
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }],
            // "dom": "lrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
        })
    </script>
@endsection