{{-- Halaman untuk membuat form peminjaman brang  --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Form Peminjaman Barang</h2>
    <a href="{{ route('pinjam') }}"><button>Kembali</button></a><br><br>
    <form action="{{ route('pinjam.store') }}" method="post">
        <input type="text" value="[id]" name="id" disabled>
        <input type="text" value="[user id]" name="user_id" disabled>
        <input type="text" placeholder="Masukkan kode barang" name="kode_barang">
        <input type="text" placeholder="Masukkan nama barang" name="nama_barang">
        <input type="text" placeholder="Masukkan jumlah pinjam" name="jumlah_pinjam">
        <input type="date" placeholder="Pilih tanggal kembali" name="tanggal_kembali">
        <input type="text" name="keterangan" placeholder="Masukan Keterrangan">
        <button type="submit">Kirim</button>
    </form>
</body>
</html> --}}

@extends('master.app')
@section('breadcumb')
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Form Peminjaman</h1>
        <a href="{{url('/dashboard')}}" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="#" class="h5 text-white">Form Peminjaman</a>
    </div>
</div>
@endsection
@section('konten')
     <!-- Contact Start -->
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+62812 9554 2914</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email to get free quote</h5>
                            <h4 class="text-primary mb-0">petik@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our office</h5>
                            <p class="text-primary mb-0">Jl. Mandor Basar No.54, Rangkapan Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16434</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form action="{{ route('pinjam.store') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <input type="text" value="{{ Auth::user()->name }}"  class="form-control border-0 bg-light px-4" placeholder="Nama Peminjam" name="peminjam" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <select id="nama" class="form-select border-0 bg-light px-4 @error('nama') is-invalid @enderror" name="nama" style="height: 55px;">
                                    <option hidden>Pilih Nama Barang</option>
                                    @foreach ($data as $brg)
                                    <option value="{{$brg->nama}}" data-kode="{{ $brg->kode }}">{{$brg->nama}}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                 @enderror
                            </div>
                            <div class="col-md-6">
                                <select id="kode" class="form-select border-0 bg-light px-4 @error('kode') is-invalid @enderror" name="kode" style="height: 55px;" @readonly(true)>
                                    <option hidden>Pilih Kode Barang</option>
                                    @foreach ($data as $brg)
                                    <option value="{{$brg->kode}}">{{$brg->kode}}</option>
                                    @endforeach
                                </select>
                                @error('kode')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <script>
                                $(document).ready(function() {
                                    $("#nama").change(function() {
                                        var nama = $(this).val();
                                        var kode = $(this).find(':selected').data('kode');
                                        $("#kode option[value='" + kode + "']").prop('selected', true);
                                    });
                                });
                            </script>
                            </div>

                            <div class="col-md-6">

                                <input type="number" value="{{old('jumlah_pinjam')}}" class="form-control border-0 bg-light px-4 @error('jumlah_pinjam') is-invalid @enderror" placeholder="Masukkan jumlah pinjam" name="jumlah_pinjam" style="height: 55px;">
                                @error('jumlah_pinjam')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <input type="date" value="{{old('tanggal_kembali')}}" class="form-control border-0 bg-light px-4 @error('tanggal_kembali') is-invalid @enderror" placeholder="Pilih tanggal kembali" name="tanggal_kembali" style="height: 55px;"><small class="text-danger">Tanggal di kembalikan</small>
                                @error('tanggal_kembali')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea value="{{old('keterangan')}}" class="form-control border-0 bg-light px-4 py-3 @error('keterangan') is-invalid @enderror" rows="4" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                                @error('keterangan')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Pinjam Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.055310262767!2d106.77489547508334!3d-6.3868639624712245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e92c0df5da9d%3A0x8499222ee6779470!2sPeTIK%20(Pesantren%20Teknologi%20Informasi%20dan%20Komunikasi)%20Program%20Kuliah%20IT%20Gratis%20Binaan%20YBM%20PLN!5e0!3m2!1sid!2sid!4v1709736424509!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection