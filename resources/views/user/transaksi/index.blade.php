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
                <div class="card-body">
                    <table class="table table-bordered table-hover table-nowrap">
                        <thead>
                            <tr>
                                <th> Items </th>
                                <th> Price </th>
                                <th> Qty </th>
                                <th> SubTotal </th>
                                <th> Action </th>
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
                                <td colspan="3" class="text-right"> Discount % </td>
                                <td class="text-right">
                                    <input type="text" name="discount" id="discount" class="form-control text-center">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold" style="border-bottom: 2px solid black;"> 
                                    Grand Total 
                                </td>
                                <td id="grandTotal" class="text-right font-weight-bold font-size-large" style="border-bottom: 2px solid black;">
                                </td>
                                <td style="border-bottom: 2px solid black;">
                                    <button class="btn btn-primary">Bayar</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
                        <td class="nama_barang" id="nama_barang_${id}"> ${nama_barang} </td>
                        <td class="harga_jual" id="harga_jual_${id}"> ${harga_jual} </td>
                        <td style="width:15%;">
                            <input type="number" id="qty_${id}" class="form-control text-center qty" value="${qty}"/>    
                        </td>
                        <td class="sub_total text-right" id="sub_total_${id}"> ${harga_jual} </td>
                        <td class="hapus_barang" id="hapus_barang_${id}" style="cursor: pointer;">
                            <i class="fa fa-trash" style="color: red;"></i>
                        </td>
                    </tr>
                `;

                $('#appendItem').append(result);
            }else{
                qty = parseInt($(`#qty_${id}`).val()) + 1;
                sub_total = parseInt(removeComma($(`#harga_jual_${id}`).html())) * qty;

                qty = number_format(qty);
                sub_total = number_format(sub_total);

                $(`#qty_${id}`).val(qty);
                $(`#sub_total_${id}`).html(sub_total);
            }

            countTotalQtyAndPay();
            
        });

        $('body').on('keyup', '.qty', function(){
            qty = number_format(parseInt($(this).val()));
            sub_total = parseInt(removeComma($(this).parent().parent().find('.harga_jual').html())) * qty;

            qty = number_format(qty);
            sub_total = number_format(sub_total);

            $(this).parent().parent().find('.sub_total').html(sub_total);
            countTotalQtyAndPay();
        });

        $('body').on('change', '#discount', function(){
            countTotalQtyAndPay();
        });

        $('body').on('click', '.hapus_barang', function(){
            $(this).parent().remove();
            countTotalQtyAndPay();
        });

        function countSubTotal(thisQty, thisHarga){
            
        }

        function countTotalQtyAndPay(){
            let totalRow = $('.qty').length;

            let totalQty = 0;
            let totalBayar = 0;

            for( let loop = 0; loop < totalRow; loop++ ){
                totalQty += parseInt($('.qty').eq(loop).val());
                totalBayar += parseInt(removeComma($('.sub_total').eq(loop).html()));
            }

            totalBayar = number_format(totalBayar);
            totalQty = number_format(totalQty);

            $('#totalQty').html(totalQty);
            $('#totalBayar').html(totalBayar);

            countGrandTotal(totalBayar);
        }

        function countGrandTotal(data){
            let grandTotal = parseInt(removeComma(data));
            let discount = parseInt($('#discount').val());

            console.log(data, discount);
            
            if( !isNaN(discount) ){
                discount = discount / 100;
                grandTotal = grandTotal - ( grandTotal * discount );
            }

            grandTotal = number_format(grandTotal);

            $('#grandTotal').html(grandTotal);
        }

        function removeComma(data){
            return data.replace(/\,/g,'');
        }

        function number_format (number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

    </script>
@endsection