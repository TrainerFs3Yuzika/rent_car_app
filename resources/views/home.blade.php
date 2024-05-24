@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
            <!-- /.row -->

            <!-- Additional Content -->
            <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <p>Booking</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/bookings" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <p>Mobil</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="admin/cars" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="admin/users" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <p>Blog</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="admin/blogs" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Setting
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Menampilkan daftar Menu Setting</h5>
                            <p class="card-text">Berisi menu setting untuk pengisian data Rent Car Surabaya</p>
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-primary">Setting</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Team
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Menampilkan daftar Menu Team</h5>
                            <p class="card-text">Berisi semua data team yang bekerja di Rent Car Surabaya</p>
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-primary">Team</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Kategori
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Menampilkan daftar Menu Kategori</h5>
                            <p class="card-text">Berisi menu Kategori tipe mobil yang ada pada Rent Car Surabaya</p>
                            <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Team
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Menampilkan daftar menu testimoni</h5>
                            <p class="card-text">Berisi semua data testimoni penyewa mobil di Rent Car Surabaya</p>
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">Testimoni</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
        
    </div>
    <!-- /.content -->
@endsection
