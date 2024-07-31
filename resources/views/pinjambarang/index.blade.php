@extends('master.template')
@section('navigasi')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peminjaman Barang </li>
        </ol>
    </nav>
@endsection
@section('konten')
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Peminjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                    $kembali = '';
                @endphp
                @foreach ($pinjam as $item)
                    <div class="modal fade" id="{{ 'id' . $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="{{ 'id' . $item->id }}">Data Peminjaman
                                        {{ $item->username }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-4">
                                        <p>
                                        <ul>
                                            <li> Peminjam : {{ $item->username }}</li>
                                            <li>Tanggal Peminjaman : {{ $item->updated_at }}</li>
                                            <li>Kode Barang : {{ $item->kode_barang }}</li>
                                            <li>Barang : {{ $item->nama_barang }}</li>
                                            <li>Jumlah : {{ $item->jumlah_pinjam }}</li>
                                            <li>Tanggal Kembali : {{ $item->tgl_kembali }}</li>
                                            <li>
                                                @if ($item->tgl_kembali >= $item->created_at)
                                                    <span class="badge bg-label-success me-1">Dikembalikan</span>
                                                @else
                                                    <span class="badge bg-label-warning me-1">Belum
                                                        Dikembalikan</span>
                                                @endif
                                            </li>
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
                        <td> <strong>{{ $no++ }}</strong></td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah_pinjam }}</td>
                        <td>{{ $item->tgl_kembali }}</td>
                        @if ($item->tgl_kembali >= $item->created_at)
                            <td><span class="badge bg-label-success me-1">Dikembalikan</span></td>
                        @else
                            <td><span class="badge bg-label-warning me-1">Belum Dikembalikan</span></td>
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('pinjem.edit', $item->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    {{-- <button
                type="button"
                class="btn btn-primary"
               
              >
              detail
              </button> --}}
                                    <button class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="{{ '#id' . $item->id }}"><i
                                            class="bx bx-pencil me-1"></i>Detail</button>
                                    <form action="{{ route('pinjem.destroy', $item->id) }}" method="GET">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure??')"><i class="bx bx-trash me-1"></i>
                                            Delete</button>
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
