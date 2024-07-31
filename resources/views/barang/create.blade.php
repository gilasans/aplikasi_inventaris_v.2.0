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
        <form action="{{ route('barang.store') }}" enctype="multipart/form-data" method="post">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-bag-shopping"></i></span>
                <select id="nama_barang" class="form-select @error('nama_barang') is-invalid @enderror" name="nama_barang">
                  <option hidden>Pilih Nama Barang</option>
                  @foreach ($barangmasuk as $brg)
                  <option value="{{$brg->nama_barang}}" data-kode="{{ $brg->kode_barang }}">{{$brg->nama_barang}}</option>
                  @endforeach
                </select>
              </div>
              @error('nama_barang')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                <select id="kode" class="form-select @error('kode') is-invalid @enderror" name="kode" @readonly(true)>
                  <option hidden>Pilih Kode Barang</option>
                  @foreach ($barangmasuk as $brg)
                  <option value="{{$brg->kode_barang}}">{{$brg->kode_barang}}</option>
                  @endforeach
                </select>
                <script>
                  $(document).ready(function() {
                      $("#nama_barang").change(function() {
                          var nama = $(this).val();
                          var kode = $(this).find(':selected').data('kode');
                          $("#kode option[value='" + kode + "']").prop('selected', true);
                      });
                  });
              </script>
            </div>
            @error('kode')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Jumlah Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="jumlah_barang" value="{{old('jumlah_barang')}}" class="form-control @error('jumlah_barang') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('jumlah_barang')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Gambar <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-folder"></i></span>
                <input type="file" name="gambar" value="{{old('gambar')}}" class="form-control @error('gambar') is-invalid @enderror" class="form-control" id="basic-icon-default-fullname" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('gambar')
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
                    <option hidden>Pilih Lokasi Barang</option>
                    @foreach ($lokasi as $item)
                    <option value="{{$item->id}}">{{$item->lokasi}}</option>
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
                    <option hidden>Pilih Kondisi Barang</option>
                    @foreach ($kondisi as $kond)
                    <option value="{{$kond->id}}">{{$kond->kondisi}}</option>
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
                    <option hidden>Pilih Kategori Barang</option>
                    @foreach ($ktg as $ktgr)
                    <option value="{{$ktgr->id}}">{{$ktgr->kategori}}</option>
                    @endforeach
                  </select>
              </div>
              @error('kategori')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Supplier <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                <select id="defaultSelect" class="form-select @error('supplier') is-invalid @enderror" name="supplier">
                    <option hidden>Pilih Supplier </option>
                    @foreach ($suplier as $splr)
                    <option value="{{$splr->id}}">{{$splr->nama}}</option>
                    @endforeach
                  </select>
              </div>
              @error('supplier')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Spesifikasi </label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2"  class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                <textarea id="basic-icon-default-message" name="spesifikasi" class="form-control" placeholder="Spesifikasi" aria-describedby="basic-icon-default-message2"></textarea>
              </div>
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