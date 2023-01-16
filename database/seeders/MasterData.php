<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Role;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasterData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // !Role
        $role = new Role;
        $role->name = 'Admin';
        $role->save();

        $role = new Role;
        $role->name = 'Karyawan';
        $role->save();

        // !User
        $user = new User;
        $user->roles_id = 1;
        $user->name = 'Antonius';
        $user->username = 'anton';
        $user->password = Hash::make('admin123');
        $user->email = 'admin1@cabar.com';
        $user->save();

        $user = new User;
        $user->roles_id = 1;
        $user->name = 'Dewi Lie';
        $user->username = 'wilie';
        $user->password = Hash::make('admin123');
        $user->email = 'admin2@cabar.com';
        $user->save();

        $user = new User;
        $user->roles_id = 1;
        $user->name = 'Hani Tasia';
        $user->username = 'hani';
        $user->password = Hash::make('admin123');
        $user->email = 'admin3@cabar.com';
        $user->save();
        
        $user = new User;
        $user->roles_id = 2;
        $user->name = 'Yaya';
        $user->username = 'yaya';
        $user->password = Hash::make('login123');
        $user->email = 'user1@cabar.com';
        $user->save();

        $user = new User;
        $user->roles_id = 2;
        $user->name = 'Bella';
        $user->username = 'bela';
        $user->password = Hash::make('login123');
        $user->email = 'user2@cabar.com';
        $user->save();

        // !Kategori
        $kategori = new Kategori;
        $kategori->kode_kategori = 'SPK';
        $kategori->nama_kategori = 'Speaker';
        $kategori->save();

        $kategori = new Kategori;
        $kategori->kode_kategori = 'KMPR';
        $kategori->nama_kategori = 'Kompor';
        $kategori->save();

        $kategori = new Kategori;
        $kategori->kode_kategori = 'LMP';
        $kategori->nama_kategori = 'Lampu';
        $kategori->save();

        $kategori = new Kategori;
        $kategori->kode_kategori = 'RC';
        $kategori->nama_kategori = 'Rice Cooker';
        $kategori->save();

        // !Merk
        $merk = new Merk;
        $merk->kode_merk = 'LOGI';
        $merk->nama_merk = 'Logitech';
        $merk->save();

        $merk = new Merk;
        $merk->kode_merk = 'ANKR';
        $merk->nama_merk = 'Anker';
        $merk->save();

        $merk = new Merk;
        $merk->kode_merk = 'MYK';
        $merk->nama_merk = 'Miyako';
        $merk->save();

        $merk = new Merk;
        $merk->kode_merk = 'RN';
        $merk->nama_merk = 'Rinnai';
        $merk->save();

        $merk = new Merk;
        $merk->kode_merk = 'PHI';
        $merk->nama_merk = 'Philips';
        $merk->save();

        // !Supplier
        $supplier = new Supplier;
        $supplier->nama_supplier = 'svarna dipa';
        $supplier->alamat_supplier = 'gudang bulog';
        $supplier->nama_sales = 'jaya frawijaya';
        $supplier->nomor_hp_sales = '081234567890';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->nama_supplier = 'CV mutiara karya super';
        $supplier->alamat_supplier = 'kedamaian';
        $supplier->nama_sales = 'riko';
        $supplier->nomor_hp_sales = '081234567890';
        $supplier->save();

        // !Barang
        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11021';
        $barang->nama_barang = 'test 1';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11022';
        $barang->nama_barang = 'test 2';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11023';
        $barang->nama_barang = 'test 3';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11024';
        $barang->nama_barang = 'test 4';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11025';
        $barang->nama_barang = 'test 5';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11026';
        $barang->nama_barang = 'test 6';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11027';
        $barang->nama_barang = 'test 7';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11028';
        $barang->nama_barang = 'test 8';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/11029';
        $barang->nama_barang = 'test 9';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110230';
        $barang->nama_barang = 'test 10';
        $barang->harga_beli = 123123;
        $barang->harga_jual = 321321;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110231';
        $barang->nama_barang = 'test 11';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110232';
        $barang->nama_barang = 'test 12';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110233';
        $barang->nama_barang = 'test 13';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110234';
        $barang->nama_barang = 'test 14';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110235';
        $barang->nama_barang = 'test 15';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110236';
        $barang->nama_barang = 'test 16';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110237';
        $barang->nama_barang = 'test 17';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110238';
        $barang->nama_barang = 'test 18';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110239';
        $barang->nama_barang = 'test 19';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();

        $barang = new Barang;
        $barang->kategori_id = 1;
        $barang->merk_id = 1;
        $barang->supplier_id = 1;
        $barang->kode_barang = 'TSTBRG/2023/01/16/110240';
        $barang->nama_barang = 'test 20';
        $barang->harga_beli = 456456;
        $barang->harga_jual = 654654;
        $barang->stok = 25;
        $barang->satuan = 'pcs';
        $barang->save();
        
    }
}
