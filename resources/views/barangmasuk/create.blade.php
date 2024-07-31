@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/barangmasuk') }}">Barang Masuk</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Tambah Data Barang Masuk</li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('supplier.index')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('barangmasuk.store') }}" method="post">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode Barang<span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="kode" value="{{old('kode')}}" class="form-control @error('kode') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Kode Barang"  aria-describedby="basic-icon-default-fullname2">
            </div>
            @error('kode')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-bag-shopping"></i></span>
                <input type="text" name="nama_barang" value="{{old('nama_barang')}}" class="form-control @error('nama_barang') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Nama Barang"  aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama_barang')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Jumlah Masuk<span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="jumlah_masuk" value="{{old('jumlah_masuk')}}" class="form-control @error('jumlah_masuk') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah Masuk"  aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('jumlah_masuk')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Supplier <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-folder"></i></span>
                <select id="defaultSelect" class="form-select @error('supplier') is-invalid @enderror" name="supplier">
                    <option hidden>Pilih Sumber Dana</option>
                    @foreach ($supplier as $splr)
                    <option value="{{$splr->id}}">{{$splr->nama}}</option>
                    @endforeach
                  </select>
              </div>
              @error('supplier')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-2"></i>Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection