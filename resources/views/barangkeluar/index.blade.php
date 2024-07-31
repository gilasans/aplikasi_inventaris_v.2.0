@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>ID Peminjaman</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Tanggal Keluar</th>
          <th>Penerima</th>
          <th>Jumlah Keluar</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        <tr>
          <td> <strong>{{$no++}}</strong></td>
          <td>ID{{$item->id}}</td>
          <td>{{$item->kode_barang}}</td>
          <td>{{$item->nama_barang}}</td>
          <td>{{$item->updated_at->isoFormat('dddd, D MMMM Y')}}</td>
          <td>{{$item->username}}</td>
          <td>{{$item->jumlah_pinjam}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                {{-- <button
                type="button"
                class="btn btn-primary"
               
              >
              detail
              </button> --}}
                <form
                action="{{ route('barang.destroy', $item->id) }}"
                method="GET">
                @method('DELETE')
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure??')"><i class="bx bx-trash me-1"></i> Delete</button>
            </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection