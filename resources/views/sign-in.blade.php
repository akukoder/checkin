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
                    <img src="{{ Storage::url($station->logo) }}" class="img-fluid" style="max-width: 200px">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card shadow mb-3">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Personal Information') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sign-in.store', $station) }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">@lang('Full name')</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">@lang('Telephone')</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="telephone" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">@lang('Temperature')</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="temperature" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-thermometer-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">@lang('Sign In')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
