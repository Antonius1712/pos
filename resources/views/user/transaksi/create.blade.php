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
                <form action="{{ route('user.transaksi.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group form-check-inline">
                            <div class="form-check">
                                <input type="checkbox" name="old_patient_checkbox" id="old_patient_checkbox" class="form-check-input" checked>
                                <label class="form-check-label" for="old_patient_checkbox">Old Customer</label>
                            </div>
    
                            <div class="form-check">
                                <input type="checkbox" name="new_customer_checkbox" id="new_customer_checkbox" class="form-check-input" >
                                <label class="form-check-label" for="new_customer_checkbox">New Customer</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control select2" style="display: block;">
                                <option value="">Pilih Kustomer</option>
                                @forelse ($Pelanggan as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama_pelanggan }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            <input type="text" name="new_customer" id="new_customer" class="form-control" style="display: none;">
                        </div>
                        <table class="table table-bordered table-hover table-nowrap">
                            <thead>
                                <tr class="bg-secondary">
                                    <th> Barang </th>
                                    <th> Harga </th>
                                    <th> Jumlah </th>
                                    <th> SubTotal </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody id="appendItem">
    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-right" style="border-bottom: 2px solid black;"> Total </td>
                                    <td id="totalQty" style="border-bottom: 2px solid black;"></td>
                                    <td id="totalBayar" class="text-right" style="border-bottom: 2px solid black;"></td>
                                    <td style="border-bottom: 2px solid black;"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"> Discount </td>
                                    <td class="text-right">
                                        <input type="text" name="discount" id="discount" class="form-control text-center" placeholder="Masukan nominal jika ada diskon">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right font-weight-bold" style="border-bottom: 2px solid black;"> 
                                        Grand Total 
                                    </td>
                                    <td id="grandTotal" class="text-right font-weight-bold font-size-large" style="border-bottom: 2px solid black;">
                                    </td>
                                    <td id="inputGrandTotal" class="text-right font-weight-bold font-size-large" style="border-bottom: 2px solid black;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        Metode Bayar
                                    </td>
                                    <td>
                                        <select name="metode_bayar" id="metode_bayar" class="form-control select2">
                                            <option value="">Pilih Metode Bayar</option>
                                            @forelse ($MetodeBayar as $val)
                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <button type="submit" class="btn btn-primary">
                                            Buat Transaksi
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{-- <div class="card" style="bottom: 0; right: 0; position: fixed; margin-right: 1%; margin-bottom: 3%;">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <td colspan="3" class="text-right"> Total </td>
                        <td id="totalBayar"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"> Discount </td>
                        <td>
                            <input type="text" name="discount" id="discount" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"> Grand Total </td>
                        <td id="grandTotal"></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div> --}}
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/transaksi/main.js') }}"></script>
    <script>
        $('body').on('keyup', '#nama_barang', function(){
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
                            col = 2;
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
                                        <button data-nama_barang="${val.nama_barang}"
                                                data-harga_jual="${val.harga_jual}"
                                                data-id="${val.id}"
                                                id="btn_tambah_barang" 
                                                class="btn btn-primary"
                                        > 
                                            Tambah 
                                        </button>    
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#display_barang').html(result);
                }
            })
        });

        $('body').on('click', '#btn_tambah_barang', function() {
            let nama_barang = $(this).data('nama_barang');
            let harga_jual = $(this).data('harga_jual');
            let id = $(this).data('id');

            let qty = 1;
            let sub_total = 0;
            let result = '';

            if( $(`#barang_${id}`).length == 0 ){
                result += `
                    <tr id="barang_${id}">
                        <td>
                            <input type="hidden" name="id_barang[]" id="id_barang_${id}" class="form-control id_barang text-center" value="${id}" readonly/>    

                            <input type="text" name="nama_barang[]" id="nama_barang_${id}" class="form-control nama_barang text-center" value="${nama_barang}" readonly/>    
                        </td>
                        <td>
                            <input type="text" name="harga_jual[]" id="harga_jual_${id}" class="form-control harga_jual text-right" value="${harga_jual}" readonly/>    
                        </td>
                        <td style="width:15%;">
                            <input type="number" name="qty[]" id="qty_${id}" class="form-control text-center qty" value="${qty}"/>    
                        </td>
                        <td>
                            <input type="text" name="sub_total[]" id="sub_total_${id}" class="form-control sub_total text-right" value="${harga_jual}" readonly/>    
                        </td>
                        <td class="hapus_barang" id="hapus_barang_${id}" style="cursor: pointer;">
                            <i class="fa fa-trash" style="color: red;"></i>
                        </td>
                    </tr>
                `;

                $('#appendItem').append(result);
            }else{
                qty = parseInt($(`#qty_${id}`).val()) + 1;
                sub_total = parseInt(removeComma($(`#harga_jual_${id}`).val())) * qty;

                qty = number_format(qty);
                sub_total = number_format(sub_total);

                $(`#qty_${id}`).val(qty);
                $(`#sub_total_${id}`).val(sub_total);
            }

            countTotalQtyAndPay();
            
        });

        $('body').on('keyup', '.qty', function(){
            qty = number_format(parseInt($(this).val()));
            sub_total = parseInt(removeComma($(this).parent().parent().find('.harga_jual').val())) * qty;

            qty = number_format(qty);
            sub_total = number_format(sub_total);

            $(this).parent().parent().find('.sub_total').val(sub_total);
            countTotalQtyAndPay();
        });

        $('body').on('change', '#discount', function(){
            countTotalQtyAndPay();
            this.value = number_format(this.value);
        });

        $('body').on('click', '.hapus_barang', function(){
            $(this).parent().remove();
            countTotalQtyAndPay();
        });

        $('body').on('click', '#new_customer_checkbox', function(){
            $('#old_patient_checkbox').prop('checked', false);
            $('#customer_id').select2().next().hide();
            $('#new_customer').show();

            if( !$(this).is(':checked') ){
                return false;
            }
        });

        $('body').on('click', '#old_patient_checkbox', function(){
            $('#new_customer_checkbox').prop('checked', false);
            $('#new_customer').hide();
            $('#customer_id').select2().next().show();

            if( !$(this).is(':checked') ){
                return false;
            }
        });
    </script>
@endsection