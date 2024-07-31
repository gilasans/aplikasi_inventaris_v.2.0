@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Supplier</li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama supplier</th>
          <th>Alamat</th>
          <th>No Telpon</th>
          <th>Kota</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        {{-- modal detail --}}
        <div class="modal fade" id="{{'id' . $item->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="{{'id' . $item->id}}"></h5>
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
                          <li>Nama Supplier  : {{$item->nama}}</li>
                          <li>No Telpon : {{$item->telp}}</li>
                          <li>Kota : {{$item->kota}}</li>
                          <li style="white-space: pre-wrap;">Alamat  : {{$item->alamat}}</li>
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
          <td>{{$item->nama}}</td>
          <td> 
        @if (Str::length($item->alamat) > 150)
            {{ substr($item->alamat, 0, 150) . '[...]' }}
        @else
            {{ $item->alamat }}
        @endif</td>
          <td>{{$item->telp}}</td>
          <td>{{$item->kota}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('supplier.edit',$item->id)}}"><i class="bx bx-edit-alt me-1"></i>  Edit</a>
                <button  class="dropdown-item"  data-bs-toggle="modal"
                data-bs-target="{{'#id'.$item->id }}"><i class="bx bx-pencil me-1"></i>Detail</button>
                <a onclick="return confirm('Anda Yakin Ingin Hapus Data??')"
                {{--  href="{{ url("kategori/destroy/{$kategori['id']}") }}"  --}}
                href="{{ route('supplier.destroy',$item->id) }}" class="dropdown-item"><i
                    class="bx bx-trash"></i> Hapus</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection