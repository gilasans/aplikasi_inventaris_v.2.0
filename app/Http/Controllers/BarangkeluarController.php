<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use RealRashid\SweetAlert\Facades\Alert;

class BarangkeluarController extends Controller
{
    public $barangkeluar;
    public function __construct()
    {
        $this->barangkeluar = new Pinjam();
    }
    public function index()
    {
        $data = Pinjam::all();
        return view('barangkeluar.index',compact('data'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
    
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy($id)
    {
        $barangkeluar = Pinjam::findOrFail($id);
        $barangkeluar->delete();
        Alert::success('Successfull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('barangkeluar');
    }
}
