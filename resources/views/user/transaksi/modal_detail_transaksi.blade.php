<div class="modal" id="ModalDetailTransaksi">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th> Nama Barang </th>
                            <th> Harga Barang </th>
                            <th> Jumlah Barang </th>
                            <th> Sub Total </th>
                        </tr>
                    </thead>
                    <tbody id="append_content">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right font-weight-bold"> Total Harga </td>
                            <td id="total_harga" class="text-right font-weight-bold"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right font-weight-bold"> Diskon </td>
                            <td id="diskon" class="text-right font-weight-bold"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right font-weight-bold"> Total Bayar </td>
                            <td id="total_bayar" class="text-right font-weight-bold font-large-1"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
    
        </div>
    </div>
</div>