@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Order</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="/dashboard/denda" class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1 class="d-inline">Detail Denda</h1>
                                </div>
                                <div>
                                 <!-- <a href="/export/{{ $denda->id }}" class="btn btn-primary center"> Cetak PDF</a> -->
                                </div>
                            </div>
                            <hr>
                            <div class="col-6">
                                <table class="table table-borderless align-baseline">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <h4>Nama Penyewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda->user->name ?? 'Nama tidak ditemukan' }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Pembayaran</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <img src="{{ asset('img/payments/' . ($denda->bank->name ?? 'default') . '.png') }}"
                                                    alt="" width="350px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Sewa</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda->orderDetail->tanggal_sewa ?? 'Tanggal sewa tidak ditemukan' }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Jatuh tempo</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $tenggang ?? 'Jatuh tempo tidak ditemukan' }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Tanggal Kembali</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>{{ $denda->pengembalianDetail->tanggal_kembali ?? 'Tanggal kembali tidak ditemukan' }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Keterlambatan</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>
                                                    @if($selisih)
                                                    <span class="badge bg-danger">{{ $selisih }} Hari</span>
                                                    @else
                                                    -
                                                    @endif
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <h4>Total Denda</h4>
                                            </th>
                                            <th>:</th>
                                            <td>
                                                <h4>Rp.{{ number_format($denda->total ?? 0) }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                @if($denda->orderDetail && $denda->orderDetail->kendaraan)
                                    <img src="{{ asset('img/kendaraan/' . $denda->orderDetail->kendaraan->slug . '.png') }}" alt="" height="250px">
                                @else
                                    <p>Gambar kendaraan tidak ditemukan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
