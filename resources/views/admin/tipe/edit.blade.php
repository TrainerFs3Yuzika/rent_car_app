@extends('admin.layout.main')
@section('content')
<div class="content-body">
  <div class="container">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
      </ol>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Tipe</h4>
          </div>
          <div class="card-body">
            <form action="/dashboard/type/{{ $type->slug }}" method="POST" class="mb-5" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama">Nama Tipe</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('nama') is-invalid
                                @enderror" placeholder="Masukkan Tipe" id="nama" name="nama" required autofocus
                    value="{{ old('nama', $type->nama) }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Tipe</button>
                  <a href="/dashboard/type" class="btn btn-danger">Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection