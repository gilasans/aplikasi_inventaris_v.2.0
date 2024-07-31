@extends('master.template')
@section('navigasi')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/barang') }}"> Data Peminjaman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Peminjaman</li>
        </ol>
    </nav>
@endsection
@section('button')
    <div class="mb-3 mt-3 ">
        <a href="{{ route('pinjem.index') }}"><button class="btn btn-warning"><i
                    class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
    </div>
@endsection
@section('konten')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <small class="text-danger">(*) Wajib di isi.</small>
                <form action="{{ route('pinjem.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Peminjam
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-paperclip"></i></span>
                                <select id="defaultSelect" class="form-select @error('kode') is-invalid @enderror"
                                    name="peminjam">
                                    <option hidden>Pilih Peminjam Barang</option>
                                    @foreach ($user as $use)
                                        <option value="{{ $use->id }}"
                                            {{ old('peminjam', $data->user_id) == $use->id ? 'selected' : '' }}>
                                            {{ $use->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Jumlah Barang
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-square"></i></span>
                                <input type="number" name="jumlah" value="{{ $data->jumlah_pinjam }}"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2">
                            </div>
                            @error('jumlah')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Barang
                            <span text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-bag-shopping"></i></span>
                                <select id="nama" class="form-select @error('nama') is-invalid @enderror"
                                    name="nama">
                                    <option hidden>Pilih Nama Barang</option>
                                    @foreach ($barang as $brg)
                                        <option value="{{ $brg->nama }}" data-kode="{{ $brg->kode }}"
                                            {{ old('nama', $data->nama_barang) == $brg->nama ? 'selected' : '' }}>
                                            {{ $brg->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nama_barang')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode Barang <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-location-dot"></i></span>
                                <select id="kode" class="form-select @error('kode_barang') is-invalid @enderror"
                                    name="kode" >
                                    <option hidden></option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->kode }}">{{ $item->kode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kode_barang')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
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
                    <div class="row mb-3">
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Tanggal Peminjaman
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-square"></i></span>
                                <input type="date" name="tgl_pinjam" value="{{ $data->created_at }}"
                                    class="form-control @error('tgl_pinjam') is-invalid @enderror"
                                    id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2">
                            </div>
                            @error('tgl_pinjam')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Tanggal
                            Pengembalian <span class="text-danger">*</span></label>
                        <div class="col-sm-10 col-md-4">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="fa-solid fa-square"></i></span>
                                <input type="date" name="tgl_kembali" value="{{ $data->tgl_kembali }}"
                                    class="form-control @error('tgl_kembali') is-invalid @enderror"
                                    id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2">
                            </div>
                            @error('tgl_kembali')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-paper-plane me-2"></i>Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
