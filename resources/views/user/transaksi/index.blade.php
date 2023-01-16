@extends('layouts.app')
@section('title')
    
@endsection
@section('css')
    
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <p>Transaksi</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label> Cari Nama Barang </label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                    </div>
                    <div id="display_barang" class="row mt-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <p>Detail Transaksi</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#nama_barang').keyup(function(){
            let nama_barang = this.value;
            let url = '{{ Route("user.transaksi.search_data_barang") }}';
            $.ajax({
                url: url,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    nama_barang: nama_barang,
                },
                success: function(data){
                    let count = data.length;
                    let result = '';
                    let col = '';

                    switch (count) {
                        case 1:
                            col = 12;
                            break;
                        case 2:
                            col = 6;
                            break;
                        case 3:
                            col = 4;
                            break;
                        case 4:
                            col = 3;
                            break;
                        case 5:
                            col = 3;
                            break;
                        case 6:
                            col = 2;
                            break;
                        default:
                            col = 12;
                    } 
                    
                    $.each(data, function(key, val){
                        result += `
                            <div class="col-12 col-md-${col} col-lg-${col}">
                                <div class="card">  
                                    <div class="card-body bg-primary">
                                        <h2 class="text-white card-title">
                                            <center>
                                                ${val.nama_barang} <br/>
                                                Rp. ${val.harga_jual}
                                            </center>
                                        </h2>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button id="btn_tambah_barang" class="btn btn-primary"> Tambah </button>    
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#display_barang').html(result);
                }
            })
        });
    </script>
@endsection