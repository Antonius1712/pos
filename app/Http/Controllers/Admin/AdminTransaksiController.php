<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailTransaksiPenjualan;
use App\Models\MetodePembayaran;
use App\Models\Pelanggan;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = TransaksiPenjualan::all();

        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Pelanggan = Pelanggan::all();
        $MetodeBayar = MetodePembayaran::all();

        return view('admin.transaksi.create', compact('Pelanggan', 'MetodeBayar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = '';
        if( isset($request->new_customer) ){
            $new_customer = new Pelanggan;
            $new_customer->nama_pelanggan = $request->new_customer;
            $new_customer->nomor_hp = '';
            $new_customer->alamat = '';
            $new_customer->save();

            $customer_id = $new_customer->id;
        } else {
            $customer_id = $request->customer_id;
        }

        $diskon = isset($request->discount) ? str_replace(',', '', $request->discount) : 0;
        $grand_total = str_replace(',', '', $request->grand_total);
        $total_harga = $grand_total + $diskon;
        $total_bayar = $grand_total;

        $transaksi = new TransaksiPenjualan;
        $transaksi->pelanggan_id = $customer_id;
        $transaksi->metode_pembayaran_id = $request->metode_bayar;
        $transaksi->diskon = $diskon;
        $transaksi->total_harga = $total_harga;
        $transaksi->total_bayar = $total_bayar;
        $transaksi->save();

        foreach( $request->nama_barang as $key => $val ){
            $detail_transaksi = new DetailTransaksiPenjualan();
            $detail_transaksi->transaksi_penjualan_id = $transaksi->id;
            $detail_transaksi->barang_id = $request->id_barang[$key];
            $detail_transaksi->jumlah_barang = $request->qty[$key];
            $detail_transaksi->harga_barang = str_replace(',', '', $request->harga_jual[$key]);
            $detail_transaksi->sub_total = str_replace(',', '', $request->sub_total[$key]);
            $detail_transaksi->save();
        }

        return redirect()->route('admin.transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchDataBarang(Request $request){
        return Barang::where('nama_barang', 'LIKE', '%'.$request->nama_barang.'%')->get();
    }
}
