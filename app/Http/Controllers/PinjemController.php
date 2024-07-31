<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Pinjam;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjemController extends Controller
{
    public $pinjam;
    public function __construct()
    {
        $this->pinjam = new Pinjam;
    }
    public function index()
    {
        $pinjam = Pinjam::all();

        return view("pinjambarang.index", compact('pinjam'));
    }

    public function create()
    {
        $user = User::all();
        $barang = Barang::all();
        return view('pinjambarang.create', compact('user', 'barang'));
    }

    public function store(Request $request)
    {
        $stok = Barang::where('kode', $request->kode)->value('jumlah');

        $rules = [
            'peminjam' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->jumlah > $stok) {
            return redirect()->back()->with('gagal', 'Jumlah yang di pinjam melebihi stok barang');
        } else {
            // jika validasi berhasil maka simpan data ke database
            $this->pinjam->user_id = $request->peminjam;
            $this->pinjam->kode_barang = $request->kode;
            $this->pinjam->nama_barang = $request->nama;
            $this->pinjam->jumlah_pinjam = $request->jumlah;
            $this->pinjam->created_at = $request->tgl_pinjam;
            $this->pinjam->tgl_kembali = $request->tgl_kembali;

            $this->pinjam->save();

            Barang::where('kode', $request->kode)->update([
                'jumlah' => DB::raw('jumlah - ' . $request->jumlah)
            ]);

            Alert::success('Successpull', 'Barang Berhasil Dipinjam');
            return redirect()->route('pinjem.index');   
        }
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $user = User::all();
        $barang = Barang::all();
        $data = Pinjam::findOrFail($id);
        return view('pinjambarang.edit', compact('user', 'barang', 'data'));
    }

    public function update(Request $request, $id)
    {
        $update = Pinjam::find($id);

        $rules = [
            'peminjam' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
        ];

        $this->validate($request, $rules, $messages);

        $update->user_id = $request->peminjam;
        $update->kode_barang = $request->kode;
        $update->nama_barang = $request->nama;
        $update->jumlah_pinjam = $request->jumlah;
        $update->created_at = $request->tgl_pinjam;
        $update->tgl_kembali = $request->tgl_kembali;

        $update->save();
        Alert::success('Successpull', 'Data Berhasil di Update');
        return redirect()->route('pinjem.index');
    }

    public function destroy($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('pinjem.index');
    }
}
