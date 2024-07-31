{{-- Halaman untuk menampilkan history peminjaman barang --}}
@extends('master.app')
@section('breadcumb')
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Peminjaman</h1>
        <a href="{{url('/dashboard')}}" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="#" class="h5 text-white">History</a>
    </div>
</div>
@endsection
@section('konten')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <a href="{{ route('pinjam.create') }}" style="color: white;">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i> Pinjam Barang</a>
                            </button>
                            </a>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-12">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed table-hover text-nowrap mb-0">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>Created at</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Keterangan</th>
                                            <th></th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ ++$no }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->created_at}}</td>
                                                    <td>{{ $item->kode_barang }}</td>
                                                    <td>{{ $item->nama_barang }}</td>
                                                    <td>{{ $item->jumlah_pinjam }}</td>
                                                    <td>{{ $item->tgl_kembali}}</td>
                                                    @if ($item->tgl_kembali >= $item->created_at)
                                                        <td><span
                                                                class="badge bg-success me-1">Dikembalikan</span>
                                                        </td>
                                                    @else
                                                        <td><span class="badge bg-warning me-1">Belum
                                                                Dikembalikan</span></td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('pinjam.destroy', $item->id) }}"
                                                            class="btn icon btn-danger ms-3">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <br>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span>{{ $data->withQueryString()->links() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

              
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection