@extends('layouts.app', ['title' => __('Stations')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ Storage::url('profile-cover.jpg') }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h1 class="display-2 text-white">{{ __('Stations') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Stations') }}</h3>
                            </div>
                            <div class="col-4 text-md-right">
                                <a href="{{ route('station.create') }}" class="btn btn-sm btn-outline-info">
                                    {{ __('Add') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (! $stations->count())
                            <div class="text-center text-danger">
                                {{ __('No station available.') }}
                            </div>
                        @endif
                    </div>

                    @if ($stations->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th style="width: 120px;">{{ __('QR Code') }}</th>
                                    <th style="width: 100px;">{{ __('Status') }}</th>
                                    <th style="width: 120px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stations as $station)
                                <tr>
                                    <td>
                                        <a href="{{ route('station.show', $station) }}">
                                            {{ $station->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if (! empty($station->qr_code))
                                            <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-{{ $station->id }}">
                                                <i class="fa fa-qrcode"></i>
                                            </a>

                                            <div class="modal" tabindex="-1" role="dialog" id="modal-{{ $station->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                {{ __('QR Code') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ $station->qr_code }}" style="{{ $station->name }}" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ route('station.generate', $station) }}"><i>{{ __('Generate') }}</i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($station->published)
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fa fa-times text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('station.edit', $station) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('station.destroy', $station) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
