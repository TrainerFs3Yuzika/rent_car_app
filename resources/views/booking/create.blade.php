@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Formulir Pemesanan</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('.bookings.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nomer_wa">Nomer HP/WhatsApp</label>
                            <input type="text" class="form-control" id="nomer_wa" name="nomer_wa" required>
                        </div>
                        <div class="form-group">
                            <label for="car_id">Pilih Mobil</label>
                            <select class="form-control" id="car_id" name="car_id" required>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->nama_mobil }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto_ktp">Foto KTP</label>
                            <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" required>
                         </div>
                        <div class="form-group">
                            <label for="metode_pembayaran">Metode_Pembayaran</label>
                            <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                         </div>
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
