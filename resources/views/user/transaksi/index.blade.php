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
                    <tr class="bg-primary text-white">
                        <th> Pelanggan </th>
                        <th> Detail Transaksi </th>
                        <th> Total Harga </th>
                        <th> Diskon </th>
                        <th> Total Bayar </th>
                        <th> Metode Bayar </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Transaksi as $val)
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
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('user.transaksi.modal_detail_transaksi')
@endsection
@section('script')
    <script>
        $('body').on('click', '.btnDetailTransaksi', function(){
            let idt = $(this).data('id');
            let total_harga = $(this).data('total_harga');
            let diskon = $(this).data('diskon');
            let total_bayar = $(this).data('total_bayar');
            let url = '{{ config("app.url_api") }}/detail-transaksi';
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
    </script>
@endsection