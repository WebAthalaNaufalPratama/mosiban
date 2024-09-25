@extends('layouts.defaults')
@section('content')
<div class="content">
    <div class="alert alert-info">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <span>Selamat Datang di Aplikasi Moban, Silahkan Pilh Menu berikut! Salam.</span>
            </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Dashboard</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            Data debit dan curah hujan yang update disajikan dalam bentuk infografis berupa
                            grafik serta tabel keseluruhan data. Data debit tersaji secara real-time sedangkan
                            curah hujan update setiap jamnya.
                            <br><br>
                            
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="{{ URL::asset('img/dash.png') }}" alt="dash icon">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <a href="./dashboard">
                               <button class="btn btn-info">Menuju dashboard <i class="tim-icons icon-minimal-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Tentang Aplikasi</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            Halaman yang berisi keterangan lengkap mengenai Moban serta penjelasannya. Cara kerja,
                            alur sistem, tim yang bekerja, semua terangkum dihalaman ini.
                            <br><br>
                            
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="{{ URL::asset('img/info.png') }}" alt="info icon">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <a href="./about">
                            <button class="btn btn-info">Lihat Selengkapnya<i class="tim-icons icon-minimal-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Kirim Saran dan Masukkan</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            Sebuah aplikasi pasti memiliki kekerungan, Kritik, Saran, dan Masukkan anda sangat berarti bagi kami
                            guna pengembangan sistem kedepannya.
                            <br><br>
                            
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="{{ URL::asset('img/feedback.png') }}" alt="feed icon">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <a href="./feedback">
                            <button class="btn btn-info">Beri Feedback <i class="tim-icons icon-minimal-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Admin Page</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            Halaman khusus pengelola sistem. Terdapat beberapa pengaturan mengenai alat dan jalannya sistem.
                            <br><br>
                            
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="{{ URL::asset('img/admin.png') }}" alt="admin icon">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            
                            <button onclick="homeadmin();"class="btn btn-info">Anda Admin? Masuk disini <i class="tim-icons icon-minimal-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection