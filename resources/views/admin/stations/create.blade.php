@extends('layouts.app', ['title' => __('Add Station')])

@section('content')
    @include('partials.header', ['title' => 'Add Station', 'class' => 'col-12 col-md-6'])

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
                                <a href="{{ route('station.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('station.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="form-group row {{ $errors->has('name') ? ' is-invalid' : '' }}">
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

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                    <label class="form-control-label col-form-label col-12 col-md-3" for="input-logo">{{ __('Logo') }}</label>

                                    <div class="col-12 col-md-8">
                                        <input
                                            type="file"
                                            name="logo"
                                            id="input-logo"
                                            class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Logo') }}">

                                        @if ($errors->has('logo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="form-control-label col-form-label col-12 col-md-3" for="input-logo">{{ __('Active') }}</label>

                                    <div class="col-12 col-md-8">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="published" id="published1" value="1" checked>
                                            <label class="form-check-label" for="published1">
                                                {{ __('Yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="published" id="published2" value="0">
                                            <label class="form-check-label" for="published2">
                                                {{ __('No') }}
                                            </label>
                                        </div>
                                    </div>
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
    </div>
@endsection
