@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/homepage4.jpg') }}')"
      >
        <div class="container">
         
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
            @if(count($errors) > 0 )
        <div class="content-header mb-0 pb-0">
            <div class="container-fluid">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('message'))
            <div class="content-header mb-0 pb-0">
                <div class="container-fluid">
                    <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                </div><!-- /.container-fluid -->
            </div>
        @endif
              <!-- Formulir -->
              <h2 class="section-heading"><strong>ISI DATA ANDA</strong></h2>
<div class="card p-5">
    <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control" id="nama" placeholder="Masukkan nama Anda" autofocus>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <input type="text" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}" class="form-control" id="alamat" placeholder="Masukkan alamat Anda">
        </div>
        <div class="form-group">
            <label for="nomer_wa">Nomer Hp/Whatsapp</label>
            <input type="string" name="nomer_wa" value="{{ old('nomer_wa') }}" class="form-control" id="nomer_wa"placeholder="Masukkan Nomor HP Anda">
        </div>
            <div class="form-group">
                <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran" accept="image/*" required>
            </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 col-form-label">Ktp anda</label>
            <div class="col-sm-14">
                <input type="file" name="foto_ktp" class="form-control">
            </div>
            <div class="form-group">
                <label for="durasi_sewa">Durasi Sewa (hari)</label>
                <select name="durasi_sewa" class="form-control" id="durasi_sewa" required>
                    <option value="">Pilih Durasi Sewa</option>
                    <option value="1">1 Hari</option>
                    <option value="2">2 Hari</option>
                    <option value="3">3 Hari</option>
                </select>
            </div>

            <div class="form-group">
                <label for="awal_penyewaan">Awal Penyewaan</label>
                <input type="text" name="awal_penyewaan" id="awal_penyewaan" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="pengembalian_penyewaan">Pengembalian Penyewaan</label>
                <input type="text" name="pengembalian_penyewaan" id="pengembalian_penyewaan" class="form-control" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<style>
    #metode_pembayaran option {
        background-size: contain;
        background-position: left center;
        padding-left: 20px;
    }
</style>

@endsection
