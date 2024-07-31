@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Barang </li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Spesifikasi</th>
          <th>Gambar</th>
          <th>Lokasi</th>
          <th>Kondisi</th>
          <th>Kategori</th>
          <th>supplier</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        <div class="modal fade" id="{{'id' . $item->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="{{'id' . $item->id}}">Data {{$item->nama}} Inventaris</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
               <div class="float-end">
                <img src="{{ asset('img') . '/' . $item->image }}" alt="Avatar" style="width: 10rem">
               </div>
               <div class="col-4">
                <p>
                  <ul>
                    <li> Kode  : {{$item->kode}}</li>
                    <li>Jumlah : {{$item->jumlah}}</li>
                    <li>Spesifikasi : {{$item->spesifikasi}}</li>
                    <li>Lokasi : {{$item->lokasi->lokasi}}</li>
                    <li>Kondisi  : {{$item->kondisi->kondisi}}</li>
                    <li>Kategori : {{$item->kategori->kategori}}</li>
                    <li>Supplier : {{$item->supplier->nama}}</li>
                  </ul>
                 </p>
                
               </div>
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
          <td>{{$item->nama}}</td>
          <td>{{$item->jumlah}}</td>
          <td>{{$item->spesifikasi}}</td>
          <td>
              <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xl pull-up" title="" data-bs-original-title="{{$item->nama}}">
                <img src="{{ asset('img') . '/' . $item->image }}" alt="Avatar" >
              </div>
            
          </td>
          <td>{{$item->lokasi->lokasi}}</td>
          @if ($item->kondisi->kondisi == 'Baru')
          <td><span class="badge bg-label-primary me-1">{{$item->kondisi->kondisi}}</span></td>
          @elseif($item->kondisi->kondisi == 'Bekas')
          <td><span class="badge bg-label-danger me-1">{{$item->kondisi->kondisi}}</span></td>
          @else
          <td><span class="badge bg-label-warning me-1">{{$item->kondisi->kondisi}}</span></td>
          @endif

          <td>{{$item->kategori->kategori}}</td>
          <td>{{$item->supplier->nama}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('barang.edit',$item->id)}}"><i class="bx bx-edit-alt me-1"></i>  Edit</a>
                {{-- <button
                type="button"
                class="btn btn-primary"
               
              >
              detail
              </button> --}}
                <button  class="dropdown-item"  data-bs-toggle="modal"
                data-bs-target="{{'#id'.$item->id }}"><i class="bx bx-pencil me-1"></i>Detail</button>
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