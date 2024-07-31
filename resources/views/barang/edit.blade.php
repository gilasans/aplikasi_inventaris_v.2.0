@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/barang') }}"> barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang </li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('barang')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{route('barang.update',$data->id)}}" enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                <input type="text" name="kode" value="{{$data->kode}}" class="form-control @error('kode') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Kode" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
            @error('kode')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-bag-shopping"></i></span>
                <input type="text" name="nama_barang" value="{{$data->nama}}" class="form-control @error('nama_barang') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Nama Barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama_barang')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Jumlah Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="jumlah_barang" value="{{$data->jumlah}}" class="form-control @error('jumlah_barang') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('jumlah_barang')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Supplier <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                <select id="defaultSelect" class="form-select @error('supplier') is-invalid @enderror" name="supplier">
                    <option hidden></option>
                    @foreach ($suplier as $splr)
                    <option value="{{$splr->id}}" @selected($data->supplier_id == $splr->id)>{{$splr->nama}}</option>
                    @endforeach
                  </select>
              </div>
              @error('supplier')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Lokasi <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                <select id="defaultSelect" class="form-select @error('lokasi') is-invalid @enderror" name="lokasi" value="{{old('lokasi')}}">
                    <option hidden></option>
                    @foreach ($lokasi as $item)
                    <option value="{{$item->id}}" @selected($data->lokasi_id == $item->id) >{{$item->lokasi}}</option>
                    @endforeach
                  </select>
              </div>
              @error('lokasi')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">kondisi <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-clipboard"></i></span>
                <select id="defaultSelect" class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" value="{{old('kondisi')}}">
                    <option hidden></option>
                    @foreach ($kondisi as $kond)
                    <option value="{{$kond->id}}" @selected($data->kondisi_id == $kond->id)>{{$kond->kondisi}}</option>
                    @endforeach
                  </select>
              </div>
              @error('kondisi')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 form-label" for="basic-icon-default-phone">Kategori <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa-solid fa-circle-info"></i></span>
                <select id="defaultSelect" class="form-select @error('kategori') is-invalid @enderror" name="kategori">
                    <option hidden></option>
                    @foreach ($ktg as $ktgr)
                    <option value="{{$ktgr->id}}" @selected($data->kategori_id == $ktgr->id)>{{$ktgr->kategori}}</option>
                    @endforeach
                  </select>
              </div>
              @error('kategori')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Gambar <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-folder"></i></span>
                <input type="file" name="gambar" value="{{old('gambar')}}" class="form-control @error('gambar') is-invalid @enderror" class="form-control" id="basic-icon-default-fullname" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
            @if ($data->image)
            <small class="text-danger">kosongkan jika tidak mengubah gambar</small>
            @endif
              @error('gambar')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 form-label" for="basic-icon-default-message">Spesifikasi </label>
            <div class="col-sm-4 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2"  class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                <textarea id="basic-icon-default-message" name="spesifikasi" style="height: 8rem;" class="form-control" placeholder="Spesifikasi" aria-describedby="basic-icon-default-message2">{{$data->spesifikasi}}</textarea>
              </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <img src="{{ asset('img') . '/' . $data->image }}" alt="" style="width:8rem;"  >
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-2"></i>Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection