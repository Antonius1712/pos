<?php

namespace Database\Seeders;

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
    }
}
