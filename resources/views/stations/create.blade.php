@extends('layouts.app', ['title' => __('Add Station')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ Storage::url('profile-cover.jpg') }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <h1 class="display-2 text-white">{{ __('Add Station') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Station Information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('station.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label col-12 col-md-3" for="input-name">{{ __('Name') }}</label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            name="name"
                                            id="input-name"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('name') }}"
                                            required
                                            autofocus>
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label col-form-label col-12 col-md-3" for="input-logo">{{ __('Logo') }}</label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="file"
                                            name="logo"
                                            id="input-logo"
                                            class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Logo') }}">
                                    </div>

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
