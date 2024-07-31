@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Stok</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah Masuk</th>
          <th>Jumlah Keluar</th>
          <th>Stok Barang</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
          $no = 1;
        @endphp
        @foreach ($data as $item)
        @foreach ($barangkeluar as $pinjem)
        @if ($pinjem->jumlah_pinjam <= $item->jumlah_masuk)
        <div class="modal fade" id="{{'id' . $item->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="{{'id' . $item->id}}">Data {{$item->nama_barang}} Inventaris</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <p>
                  <ul>
                    <li>Kode Barang  : {{$item->kode_barang}}</li>
                    <li>Nama Barang: {{$item->nama_barang}}</li>
                    <li>Stok Barang : {{$item->jumlah_masuk - $pinjem->jumlah_pinjam}}</li>
                    <li>Supplier  : {{$item->supplier->nama}}</li>
                  </ul>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td> <strong>{{$no++}}</strong></td>
          <td>{{$item->kode_barang}}</td>
          <td>{{$item->nama_barang}}</td>
          <td>{{$item->jumlah_masuk}}</td>
          <td>{{$pinjem->jumlah_pinjam}}</td>
          <td>{{$item->jumlah_masuk - $pinjem->jumlah_pinjam}}</td>
          <td></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="{{'#id'.$item->id }}"><i class="bx bx-pencil me-1"></i>Detail</button>
                <form action="{{ route('barangmasuk.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure??')"><i class="bx bx-trash me-1"></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endif
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
@endsection