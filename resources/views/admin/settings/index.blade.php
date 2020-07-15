@extends('layouts.app', ['title' => __('Settings')])

@section('content')
    @include('partials.header', ['title' => 'Settings'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('General') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">
                                    {{ __('Site Name') }}
                                </label>
                                <div class="col-md-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="site-name"
                                        value="{{ old('site-name', setting('site-name', config('app.name'))) }}"
                                        required
                                        autofocus>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">
                                    {{ __('Logo (for dark background)') }}
                                </label>
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="site-logo-white">
                                </div>

                                <div class="col-md-4 offset-md-3 mt-2">
                                    <div class="bg-darker p-3">
                                        <img src="{{ Storage::url(setting('site-logo-white', 'site/logo-default.png')) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">
                                    {{ __('Logo (for light background)') }}
                                </label>
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="site-logo-dark">
                                </div>

                                <div class="col-md-4 offset-md-3 mt-2">
                                    <div class="bg-lighter p-3">
                                        <img src="{{ Storage::url(setting('site-logo-dark', 'site/logo-default-dark.png')) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">
                                    {{ __('Header Image') }}
                                </label>
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="header-image">
                                </div>

                                <div class="col-md-6 offset-md-3 mt-2">
                                    <div class="bg-lighter p-3">
                                        <img src="{{ Storage::url(setting('header-image', 'site/profile-cover.jpg')) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
