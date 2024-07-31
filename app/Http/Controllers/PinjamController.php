<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $pinjam;
    public function __construct()
    {
        $this->pinjam = new Pinjam;
    }
    public function index()
    {
        //
        $pinjam = Pinjam::all();

        return view("user.history", compact('pinjam'));
    }

    public function history(Request $request)
    {
        //
        $search = $request->get("search");
        $batas = 5;
        $data = DB::table('pinjam')->simplePaginate($batas);
        $no = $batas * ($data->currentPage() - 1);

        return view("user.history", compact('data', 'no', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Barang::all();
        return view('user.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            
            'peminjam' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'jumlah_pinjam' => 'required',
            'tanggal_kembali' => 'required'
        ];

        // pesan error
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
            
        ];

        $this->validate($request, $rules, $messages);
        
      
        $this->pinjam->username = $request->peminjam;
        $this->pinjam->kode_barang = $request->kode;
        $this->pinjam->nama_barang = $request->nama;
        $this->pinjam->jumlah_pinjam = $request->jumlah_pinjam;
        $this->pinjam->tgl_kembali = $request->tanggal_kembali;
        $this->pinjam->keterangan = $request->keterangan;

        
        $this->pinjam->save();

        Alert::success('Successpull', 'Barang Berhasil Dipinjam');
        return redirect()->route('pinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Barang::all();
        $pinjam = Pinjam::findOrFail($id);
        return view('user.edit', compact('pinjam','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $update = Pinjam::findOrFail($id);
        $update->pinjam = $request->user_id;
        $update->pinjam = $request->kode_barang;
        $update->pinjam = $request->nama_barang;
        $update->pinjam = $request->jumlah_pinjam;
        $update->pinjam = $request->tgl_kembali;
        $update->pinjam = $request->keterangan;

        // memeriksa field table ada perubahan atau tidak
        if ($update->isDirty()) {
            $rules = [
                'user_id' => 'required',
                'kode_barang' => 'required',
                'nama_barang' => 'required',
                'jumlah_pinjam' => 'required',
                'tgl_kembali' => 'required',
                'keterangan' => 'required'
            ];
            // pesan error
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'min' => ':attribute minimal harus 3 huruf',
                'max' => ':attribute maximal 20 huruf',
                'unique' => ':atribute sudah ada, silakan gunakan yang lain'
            ];
            // eksekusi fungsi
            $this->validate($request, $rules, $messages);

            $update->pinjam = $request->user_id;
            $update->pinjam = $request->kode_barang;
            $update->pinjam = $request->nama_barang;
            $update->pinjam = $request->jumlah_pinjam;
            $update->pinjam = $request->tgl_kembali;
            $update->pinjam = $request->keterangan;
            $update->save();
            Alert::success('Successpull', 'Berhasil di Update');
            return redirect()->route('user.history');
        } else {
            echo "tidak ada perubahan";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pinjam = Pinjam::findOrFail($id); // mengambil data sesuai idnya
        
        $pinjam->delete(); // fungsi menghapus data
        Alert::success('Successpull', 'Berhasil di Hapus'); // menampilakan pemberitahuan kepada pengguna
        return redirect()->route("pinjam"); // redirect hlaman ketika fungsi berhasil di jalankan
    }
}
