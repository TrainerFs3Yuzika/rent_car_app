@extends('admin.layout.main')
@section('content')
<div class="content-body">
    <div class="container">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kendaraan</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">Kendaraan</h4>
                                    <a href="/dashboard/kendaraan" class="btn btn-primary"><i class="fas fa-sync"></i>
                                        Reset</a>
                                </div>
                                <div class="col col-lg-2">
                                    <a href="/dashboard/kendaraan/create" class="btn btn-primary">
                                        <i class="fas fa-plus"> Tambah Data</i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <form action="/dashboard/kendaraan">
                                        <label for="category" class="form-label text-center">Category</label>
                                        <select class="default-select form-control wide mb-3" name="category"
                                            onchange="submit()">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                        <label for="jumlah_penumpang" class="form-label text-center"></label>
                                        <input type="text" class="form-control" name="jumlah_penumpang" id="jumlah_penumpang" value="{{ request('jumlah_penumpang') }}" placeholder="Masukkan Jumlah Penumpang">
                                        <button type="submit" class="btn btn-primary mt-3">Cari</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 1000px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Gambar</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Plat Nomor </th>
                                        <th>Tipe</th>
                                        <th>Jml Penumpang</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kendaraans as $kendaraan)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="@if (!$kendaraan -> image)
                                            {{ asset('img/kendaraan/'.$kendaraan -> slug.'.png') }}
                                            @else
                                            {{asset('storage/'.$kendaraan->image)}}
                                          @endif" width="200px">
                                        </td>
                                        <td>{{ $kendaraan->nama }}</td>
                                        <td>{{ $kendaraan -> plat_nomor }}</td>
                                        <td>{{ $kendaraan->type->nama }}</td>
                                        <td>{{ $kendaraan->jumlah_penumpang }}</td>
                                        <td>Rp. {{ number_format($kendaraan->harga) }}</td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="/dashboard/kendaraan/{{$kendaraan->slug}}">
                                                        <i class="fas fa-eye text-primary me-2"></i>Show
                                                    </a>
                                                    <a class="dropdown-item" href="/dashboard/kendaraan/{{$kendaraan->slug}}/edit">
                                                        <i class="fas fa-edit text-warning me-2"></i>Edit
                                                    </a>
                                                    <!-- Tautan Hapus -->
                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kendaraan->slug }}').submit();">
                                                        <i class="fas fa-trash text-danger me-2"></i>Delete
                                                    </a>

                                                    <!-- Formulir Tersembunyi -->
                                                    <form id="delete-form-{{ $kendaraan->slug }}" action="/dashboard/kendaraan/{{ $kendaraan->slug }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@section('sweetAlert')
<script>
    const deleteButton = document.querySelectorAll('.delete');
      deleteButton.forEach((dBtn) => {
          dBtn.addEventListener('click', function (event) {
              event.preventDefault();

              const postSlug = this.dataset.slug;
              const postTitle = this.dataset.name;
              Swal.fire({
                  title: 'Anda Yakin Menghapus Kendaraan Ini ?',
                  text: "Data Kendaraan : " + postTitle,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Hapus!'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              const dataSlug = document.getElementById('data-' + postSlug);
                              dataSlug.submit();
                          }
              })
          })
      });
</script>
@endsection
@endsection