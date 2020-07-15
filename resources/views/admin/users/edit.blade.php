@extends('layouts.app', ['title' => __('Edit User')])

@section('content')
    @include('partials.header', ['title' => 'Edit User', 'class' => 'col-12 col-md-6'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3">{{ __('Name') }}</label>
                                <div class="col-12 col-md-8">
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}"
                                        name="name"
                                        required
                                        autofocus>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3">{{ __('Email') }}</label>
                                <div class="col-12 col-md-8">
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}"
                                        name="email" required>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3">{{ __('Password') }}</label>
                                <div class="col-12 col-md-5">
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password">
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label class="col-form-label col-12 col-md-3">{{ __('Repeat Password') }}</label>
                                <div class="col-12 col-md-5">
                                    <input
                                        type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
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
    </div>
@endsection
