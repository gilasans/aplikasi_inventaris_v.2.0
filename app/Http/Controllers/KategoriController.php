<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        //
    }
    public function dashboard()
    {
        //
        $user = User::all();
        $ktg = Kategori::all();
        $brg = DB::table('barang')->simplePaginate(4);
        return view('dashboard',compact('user','ktg', 'brg'));
    }
    public function welcome()
    {
        //
        $user = User::all();
        $ktg = Kategori::all();
        $brg = DB::table('barang')->simplePaginate(4);
        return view('welcome',compact('user','ktg', 'brg'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
