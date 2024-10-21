@extends('layouts.app')

@section('content')
<style>
    .img-wrap-1 {
    display: flex;
    justify-content: flex-end; /* Membuat gambar berada di kanan */
    margin-bottom: 5rem; /* Jarak bawah sesuai dengan class mb-5 */
}

.img-wrap-1 img {
    width: 800px;
    height: 500px;
    object-fit: cover; /* Menjaga proporsi gambar */
}

    </style>
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <h1>Halloo</h1>
                                <h2>Selamat Datang Di RAS Rental Mobil</h2>
                                {{ __('You are logged in!') }}
                                <div class="img-wrap-1 mb-5">
                                    <img 
                                      src="{{ asset('images/rush.png') }}"
                                      alt="Image"
                                      class="img-fluid"
                                      
                                    />
                                  </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection