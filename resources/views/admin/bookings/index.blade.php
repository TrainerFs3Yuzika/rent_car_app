@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Nomer HP/WhatsApp</th>
                                            <th>Mobil</th>
                                            <th>Foto KTP</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Durasi Sewa (hari)</th>
                                            <th>Awal Penyewaan</th>
                                            <th>Pengembalian Penyewaan</th>
                                            <th>Status Penyewaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->nama_lengkap }}</td>
                                                <td>{{ $booking->alamat_lengkap }}</td>
                                                <td>
                                                    <a href="tel:{{ $booking->nomer_wa }}">{{ $booking->nomer_wa }}</a>
                                                </td>
                                                <td>{{ $booking->car->nama_mobil }}</td>
                                                <td>
                                                    @if($booking->foto_ktp)
                                                        <a target="_blank" href="{{ asset('storage/' . $booking->foto_ktp) }}">
                                                            <img width="80" src="{{ asset('storage/' . $booking->foto_ktp) }}" alt="Lihat Foto KTP">
                                                        </a>
                                                    @else
                                                        Tidak ada foto KTP
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($booking->bukti_pembayaran)
                                                        <a target="_blank" href="{{ asset('storage/' . $booking->bukti_pembayaran) }}">Lihat Bukti Pembayaran</a>
                                                    @else
                                                        Belum ada bukti pembayaran
                                                    @endif
                                                </td>
                                                <td>{{ $booking->durasi_sewa }}</td>
                                                <td>{{ $booking->awal_penyewaan }}</td>
                                                <td>{{ $booking->pengembalian_penyewaan }}</td>
                                                <td>{{ ucfirst($booking->status_penyewaan) }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <form onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" action="{{ route('admin.bookings.destroy', $booking) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">Data Kosong!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#data-table").DataTable();
        });
    </script>
@endpush
