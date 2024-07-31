<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{

    public $supplier;
    public function __construct()
    {
        $this->supplier = new Supplier();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Supplier::all();
        return view('supplier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nama' => 'required|min:3|max:25',
            'alamat' => 'required|min:3|max:250',
            'no_telpon' => 'required|max:13|min:8',
            'kota' => 'required',
           

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong ',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ' jumlah :attribute terlalu banyak',
            'min' => 'jumlah :attribute terlalu terlalu sedikit',
        ];
        $this->validate($request, $rules, $messages);
       
        $this->supplier->nama = $request->nama;
        $this->supplier->alamat = $request->alamat;
        $this->supplier->telp = $request->no_telpon;
        $this->supplier->kota = $request->kota;


        
        
        $this->supplier->save();
        Alert::success('Successpull', 'Data Berhasil di Tambahkan');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($supplier)
    {
        //
        $data = Supplier::findOrFail($supplier);
        return view('supplier.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $supplier)
    {
        //
        $update = Supplier::find($supplier);

        // versi kak indra
        // isDirty() buat ngecek ada perubahan ato tidak
        $update->nama = $request->nama;
        $update->alamat = $request->alamat;
        $update->telp = $request->no_telpon;
        $update->kota = $request->kota;
        if ($update->isDirty()) {
            $rules = [
                // max:ukuran file dalam kb
                'nama' => 'required|min:3|max:25',
                'alamat' => 'required|min:3|max:250',
                'no_telpon' => 'required|max:13|min:8',
                'kota' => 'required',
               
    
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong ',
                'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
                'max' => ' jumlah :attribute terlalu banyak',
                'min' => 'jumlah :attribute terlalu terlalu sedikit',
            ];
            $this->validate($request, $rules, $messages);
            $update->nama = $request->nama;
            $update->alamat = $request->alamat;
            $update->telp = $request->no_telpon;
            $update->kota = $request->kota;
            $update->save();
            Alert::success('Successpull', 'Data Berhasil di Update');
            return redirect()->route('supplier.index');
        } else {
            Alert::warning('Why??', 'Data tidak di Ubah');
            return redirect()->route('supplier.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $supplier)
    {
        //
         // ambil data sesuai id
         $data = Supplier::findOrFail($supplier);
         // fungsi buat hapus data
         
         $data->delete();
         Alert::success('Successpull', 'Data Berhasil di Hapus');
         // redirect
         return redirect()->route('supplier.index');
    }
}
