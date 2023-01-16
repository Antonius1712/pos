<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBarangRequest;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $kategori;
    protected $merk;
    protected $supplier;

    public function __construct()
    {
        $this->kategori = Kategori::all();
        $this->merk = Merk::all();
        $this->supplier = Supplier::all();
    }

    public function index()
    {
        $barangs = Barang::all();

        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = $this->kategori;
        $merk = $this->merk;
        $supplier = $this->supplier;

        return view('admin.barang.create', compact('kategori', 'merk', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminBarangRequest $request)
    {
        // dd($request->all());
        try {
            $barang = Barang::create($request->validated());
        } catch(\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['err' => $e->getMessage()]);
        }

        $kode_barang = $this->GenerateKodeBarang($barang->id);
        $barang->update(['kode_barang' => $kode_barang]);
        
        return redirect()->route('admin.barang.index');
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
    public function edit(Barang $barang)
    {
        $kategori = $this->kategori;
        $merk = $this->merk;
        $supplier = $this->supplier;

        return view('admin.barang.edit', compact('barang', 'kategori', 'merk', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminBarangRequest $request, Barang $barang)
    {
        $barang->update($request->validated());
        return redirect()->route('admin.barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('admin.barang.index');
    }

    public function GenerateKodeBarang($data){
        $data = Barang::where('id', $data)->with('kategori', 'merk')->first();
        $random = $this->UniqueRandomNumbersWithinRange(0, rand(1, 100), 5); // (min, max, digit)
        $romanYear = $this->numberToRomanRepresentation(now()->format('Y'));
        $romanMonth = $this->numberToRomanRepresentation(now()->format('m'));
        $romanDate = $this->numberToRomanRepresentation(now()->format('d'));

        return $data->kategori->kode_kategori.''.$data->merk->kode_merk.'/'.$romanYear.'/'.$romanMonth.'/'.$romanDate.'/'.$random;
    }

    public function UniqueRandomNumbersWithinRange($min, $max, $digit) {
        $numbers = range($min, $max);
        shuffle($numbers);
        $arr = array_slice($numbers, 0, $digit);

        $result = '';
        foreach( $arr as $val ){
            $result .= $val;
        }

        $result = substr($result, 0, $digit);

        return $result;
    }

    function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
