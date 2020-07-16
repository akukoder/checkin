@extends('layouts.guest', ['title' => $attendance->station->name])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ $profileImage ?? Storage::url(setting('header-image', 'site/profile-cover.jpg')) }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid">
            @include('partials.flash')
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 text-center">
                    <img src="{{ Storage::url('site/success.png') }}" class="img-fluid" style="max-width: 200px">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">
                <div class="card shadow mb-3">
                    <div class="card-body">

                        <div class="small text-muted text-center">
                            <img src="{{ Storage::url($attendance->station->logo) }}" class="img-fluid" style="max-width: 100px">
                        </div>
                        <h1 class="text-center mb-4">
                            {{ $attendance->station->name }}
                        </h1>

                        <div class="row mb-3">
                            <div class="col-6 text-left">
                                <div class="small text-muted">@lang('Name')</div>
                                <div><strong>{{ $attendance->name }}</strong></div>
                            </div>

                            <div class="col-6 text-right">
                                <div class="small text-muted">@lang('Name')</div>
                                <div><strong>{{ $attendance->telephone }}</strong></div>
                            </div>
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-6 text-left">
                                <div class="small text-muted">@lang('Date')</div>
                                <div><strong>{{ date('j F y', strtotime($attendance->created_at)) }}</strong></div>
                            </div>

                            <div class="col-6 text-right">
                                <div class="small text-muted">@lang('Time')</div>
                                <div><strong>{{ date('h:i a', strtotime($attendance->created_at)) }}</strong></div>
                            </div>
                        </div><!-- /.row -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
