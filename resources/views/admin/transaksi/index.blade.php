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
                <a href="{{ route('admin.transaksi.create') }}" class="btn btn-white" style="vertical-align: middle;">
                    Tambah Transaksi
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th> Pelanggan </th>
                        <th> Detail Transaksi </th>
                        <th> Total Harga </th>
                        <th> Diskon </th>
                        <th> Total Bayar </th>
                        <th> Metode Bayar </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $val)
                        <tr>
                            <td> {{ $val->customer_name }} </td>
                            <td>
                                <button class="btn btn-primary btnDetailTransaksi" data-id="{{ $val->id }}" data-total_harga="{{ $val->total_harga }}" data-diskon="{{ $val->diskon }}" data-total_bayar="{{ $val->total_bayar }}">
                                    Lihat Detail Transaksi
                                </button>
                            </td>
                            <td> {{ $val->total_harga }} </td>
                            <td> {{ $val->diskon }} </td>
                            <td> {{ $val->total_bayar }} </td>
                            <td> {{ $val->metode_bayar }} </td>
                            <td>
                                <i class="badge badge-{{ $val->badge_type }}">
                                    {{ $val->status }}
                                </i>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="ActionBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="ActionBtn" style="background-color: #F8F8F8; padding: 10px;">
                                        {{-- <a class="dropdown-item" href="{{ route('admin.transaksi.update-status', 
                                            [
                                                'id' => $val->id, 
                                                'status' => 2
                                            ]
                                        ) }}">
                                            Update Sudah Bayar
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.transaksi.update-status', 
                                            [
                                                'id' => $val->id, 
                                                'status' => 3
                                            ]
                                        ) }}">
                                            Update Cancel Order
                                        </a> --}}
                                        <form id="form_sudah_bayar" action="{{ route('admin.transaksi.update-status', 
                                            [
                                                'id' => $val->id, 
                                                'status' => 2
                                            ]
                                        ) }}" method="post">
                                        @csrf
                                            <button id="btn_sudah_bayar" type="submit" class="btn btn-sm btn-success btn-icon">
                                                Update Sudah Bayar
                                            </button>
                                        </form>

                                        <form id="form_cancel_order" action="{{ route('admin.transaksi.update-status', 
                                            [
                                                'id' => $val->id, 
                                                'status' => 3
                                            ]
                                        ) }}" method="post" class="mt-2">
                                        @csrf
                                            <button id="btn_cancel_order" type="submit" class="btn btn-sm btn-danger btn-icon">
                                                Update Cancel Order
                                            </button>
                                        </form>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.transaksi.modal_detail_transaksi')
@endsection
@section('script')
    <script>
        $('body').on('click', '.btnDetailTransaksi', function(){
            let idt = $(this).data('id');
            let total_harga = $(this).data('total_harga');
            let diskon = $(this).data('diskon');
            let total_bayar = $(this).data('total_bayar');
            let url = '{{ config("app.url_api") }}/detail-transaksi';
            let token = '{{ config("app.token_api") }}';
            $.ajax({
                url: url,
                type: 'post',
                headers: {
                    'token': token
                },
                data: {
                    idt: idt,
                },
                success:function(response){
                    let result = '';
                    if( response.code == 200 ){
                        $.each(response.data, function(key, val){
                            result += `
                                <tr>
                                    <td> ${val.nama_barang} </td>
                                    <td class="text-right"> ${val.harga_barang} </td>
                                    <td> ${val.jumlah_barang} </td>
                                    <td class="text-right"> ${val.sub_total} </td>
                                </tr>
                            `;
                        });

                        $('#append_content').html(result);
                        $('#total_harga').html(total_harga);
                        $('#diskon').html(diskon);
                        $('#total_bayar').html(total_bayar);

                        $('#ModalDetailTransaksi').modal('show');
                    } else {
                        swal({
                            html: '<div class="alert alert-danger">Error</div>',
                        });
                    }
                }
            })
        });

        $('body').on('click', '#btn_sudah_bayar', function(e){
            e.preventDefault();
            swal({
                title: "Yakin sudah bayar?",
                text: "Coba cek rekening nya dulu.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Iya Sudah Bayar',
                cancelButtonText: "Belum Bayar !!"
            }).then(function(isConfirm){
                if (isConfirm.value){
                    $('#form_sudah_bayar').submit();
                }
            });
        });

        $('body').on('click', '#btn_cancel_order', function(e){
            e.preventDefault();
            swal({
                title: "Yakin transaksi ini di cancel?",
                text: "Coba cek cek dulu.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Iya Udah Cancel aja!',
                cancelButtonText: "Jangan di Cancel !!"
            }).then(function(isConfirm){
                if (isConfirm.value){
                    $('#form_cancel_order').submit();
                }
            });
        });
    </script>
@endsection