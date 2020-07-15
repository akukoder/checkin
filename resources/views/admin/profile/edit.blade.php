@extends('layouts.app', ['title' => __('Update Profile')])

@section('content')
    @include('partials.header', ['title' => 'Update Profile', 'class' => 'col-12 col-md-6'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Your Information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">{{ __('Back to Home') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="col-form-label col-12 col-md-3" for="input-name">{{ __('Name') }}</label>
                                    <div class="col-12 col-md-8">
                                        <input
                                            type="text"
                                            name="name"
                                            id="input-name"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="col-form-label col-12 col-md-3" for="input-email">{{ __('Email') }}</label>
                                    <div class="col-12 col-md-8">
                                        <input
                                            type="email"
                                            name="email"
                                            id="input-email"
                                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update Profile') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card bg-secondary shadow mt-4">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Your Password') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="pl-lg-4">
                                <div class="form-group row{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="col-form-label col-md-3" for="input-current-password">{{ __('Current Password') }}</label>
                                    <div class="col-md-7">
                                        <input
                                            type="password"
                                            name="old_password"
                                            id="input-current-password"
                                            class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Current Password') }}" value="" required>
                                    </div>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group row{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="col-form-label col-md-3" for="input-password">{{ __('New Password') }}</label>
                                    <div class="col-md-7">
                                        <input
                                            type="password"
                                            name="password"
                                            id="input-password"
                                            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('New Password') }}" value="" required>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <div class="col-md-7">
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="input-password-confirmation"
                                            class="form-control"
                                            placeholder="{{ __('Confirm New Password') }}" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
