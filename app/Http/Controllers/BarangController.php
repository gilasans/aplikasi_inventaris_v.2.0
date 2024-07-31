<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Kategori;
use App\Models\Kondisi;
use App\Models\Lokasi;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
class BarangController extends Controller
{


    public $barang;
    public function __construct()
    {
        $this->barang = new Barang();
    }
    public function index()
    {
        //
        $data = Barang::all();
        return view('barang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barangmasuk = Barangmasuk::all();
        $ktg = Kategori::all();
        $lokasi = Lokasi::all();
        $kondisi = Kondisi::all();
        $suplier = Supplier::all();
        return view('barang.create',compact('barangmasuk','ktg','lokasi','kondisi','suplier'));
     
    }
    public function count(Request $request)
    {
        //
        $barangmasuk = Barangmasuk::all();
        $ktg = Kategori::all();
        $lokasi = Lokasi::all();
        $kondisi = Kondisi::all();
        $suplier = Supplier::all();
        return view('home',compact('barangmasuk','ktg','lokasi','kondisi','suplier'));
     
    }

    public function store(Request $request)
    {
        //
        $rules = [
            // max:ukuran file dalam kb
            'gambar' => 'required|mimes:jpg,png,jpeg|max:250',
            'kode' => 'required|unique:barang,kode',
            'nama_barang' => 'required|max:25 ',
            'jumlah_barang' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'kategori' => 'required',
            'supplier' => 'required',
            'spesifikasi' => 'max:40',

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong ',
            'mimes' => 'extensi file tidak didukung, silahkan gunakan (.jpg/.png/.jpeg)',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $gambar = $request->gambar;
        // $namaFile = $gambar->getClientOriginalName();
        // rename nama gambar
        // getClientOriginalExtension = untuk mendapatkan ekstensi file
        // getClientOriginalName = untuk mendapatkan nama file
        $namaFile = time() . rand(100, 999) . '.'. $gambar->getClientOriginalExtension();
        // echo $namaFile;
        $this->barang->image = $namaFile;
        $this->barang->kode = $request->kode;
        $this->barang->nama = $request->nama_barang;
        $this->barang->jumlah = $request->jumlah_barang;
        $this->barang->kategori_id = $request->kategori;
        $this->barang->lokasi_id = $request->lokasi;
        $this->barang->kondisi_id = $request->kondisi;
        $this->barang->supplier_id = $request->supplier;
        $this->barang->spesifikasi = $request->spesifikasi;

        
        $gambar->move(public_path() . '/img', $namaFile);
        $this->barang->save();
        Alert::success('Successpull', 'Data Berhasil di Tambahkan');
        return redirect()->route('barang');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($barang)
    {
        //
        $ktg = Kategori::all();
        $lokasi = Lokasi::all();
        $kondisi = Kondisi::all();
        $suplier = Supplier::all();
        $data = Barang::findOrFail($barang);
        return view('barang.edit',compact('ktg','lokasi','kondisi','suplier','data' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$barang)
    {
        //
        $update = Barang::find($barang);

        $rules = [
            // max:ukuran file dalam kb
            'gambar' => 'mimes:jpg,png,jpeg|max:250',
            'kode' => 'required',
            'nama_barang' => 'required|max:25 ',
            'jumlah_barang' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'kategori' => 'required',
            'supplier' => 'required',

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong cuy',
            'mimes' => 'extensi file tidak didukung, silahkan gunakan (.jpg/.png/.jpeg)',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
        ];
        $this->validate($request, $rules, $messages);

        if (!$request->gambar) {
            $update->kode = $request->kode;
            $update->nama = $request->nama_barang;
            $update->jumlah = $request->jumlah_barang;
            $update->kategori_id = $request->kategori;
            $update->lokasi_id = $request->lokasi;
            $update->kondisi_id = $request->kondisi;
            $update->supplier_id = $request->supplier;
            $update->spesifikasi = $request->spesifikasi;
            $update->save();
            Alert::success('Successpull', 'Data Berhasil di Update');
            return redirect()->route('barang');
        } 
        
        // gimana kalau nama gambarnya sama sedangkan wujud gambarnya berbeda ?
        // replace gembar
        $gambar = $request->gambar;
        $namaFile = time() . rand(100, 999) . '.'. $gambar->getClientOriginalExtension();
        $gambar->move(public_path() . '/img', $namaFile);

            $update->image = $namaFile;
            $update->kode = $request->kode;
            $update->nama = $request->nama_barang;
            $update->jumlah = $request->jumlah_barang;
            $update->kategori_id = $request->kategori;
            $update->lokasi_id = $request->lokasi;
            $update->kondisi_id = $request->kondisi;
            $update->supplier_id = $request->supplier;
            $update->spesifikasi = $request->spesifikasi;
        
        $update->save();
        Alert::success('Successpull', 'Data Berhasil di Update');
        return redirect()->route('barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $barang)
    {
        //
        $barang = Barang::findOrFail($barang);
        $barang->delete();
        // fungsi buat hapus file
        $path = 'img/' . $barang->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('barang');
    }
}
