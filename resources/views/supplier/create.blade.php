@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/supplier') }}">Supplier</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Tambah Data Supplier</li>
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
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Supplier <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="nama supplier"  aria-describedby="basic-icon-default-fullname2">
            </div>
            @error('nama')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Alamat <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-bag-shopping"></i></span>
                <input type="text" name="alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Alamat"  aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('alamat')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nomor Telpon <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="no_telpon" value="{{old('no_telpon')}}" class="form-control @error('no_telpon') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Nomor Telpon"  aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('no_telpon')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kota <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-folder"></i></span>
                <input type="text" name="kota" value="{{old('kota')}}" class="form-control @error('kota') is-invalid @enderror" class="form-control" id="basic-icon-default-fullname" placeholder="Kota" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('kota')
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