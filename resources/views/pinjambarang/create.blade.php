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
  <a href="{{route('barang')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('pinjem.store') }}"  method="post">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Peminjam <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="nama" value="{{ Auth::user()->name }}" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
            @error('nama')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Jumlah Barang <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="jumlah" value="{{old('jumlah_barang')}}" class="form-control @error('jumlah') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('jumlah')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Barang <spantext-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-bag-shopping"></i></span>
                <select id="nama" class="form-select @error('nama_barang') is-invalid @enderror" name="nama">
                  <option hidden>Pilih Nama Barang</option>
                  @foreach ($barang as $brg)
                    <option value="{{$brg->nama}}" data-kode="{{ $brg->kode }}">{{$brg->nama}}</option>
                  @endforeach
                </select>
              </div>
              @error('nama_barang')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
             <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode Barang <span class="text-danger">*</span></label>
             <div class="col-sm-10 col-md-4">
               <div class="input-group input-group-merge">
                 <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                 <select id="kode" class="form-select @error('kode_barang') is-invalid @enderror" name="kode" @readonly(true)>
                     <option hidden></option>
                     @foreach ($barang as $item)
                     <option value="{{$item->kode}}">{{$item->kode}}</option>
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
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Tanggal Peminjaman <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="date" name="tgl_pinjam" value="{{old('tgl_pinjam')}}" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('tgl_pinjam')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Tanggal Pengembalian <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="date" name="tgl_kembali" value="{{old('tgl_kembali')}}" class="form-control @error('tgl_kembali') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Jumlah barang" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('tgl_kembali')
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
