@extends('layouts.guest', ['title' => $station->name])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ $profileImage ?? Storage::url(setting('header-image', 'site/profile-cover.jpg')) }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid">
            @include('partials.flash')
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 text-center">
                    <img src="{{ $station->qr_code }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
