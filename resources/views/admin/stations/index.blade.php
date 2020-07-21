@extends('layouts.app', ['title' => __('Stations')])

@section('content')
    @include('partials.header', ['title' => 'Stations', 'class' => 'col-12 col-md-10'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('All Stations') }}</h3>
                            </div>
                            <div class="col-4 text-md-right">
                                <a href="{{ route('station.create') }}" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="{{ __('Add New') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (! $stations->count())
                    <div class="card-body">
                        <div class="text-center text-danger">
                            {{ __('No station available.') }}
                        </div>
                    </div>
                    @endif

                    @if ($stations->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30px"></th>
                                    <th>{{ __('Name') }}</th>
                                    <th style="width: 120px;">{{ __('Today') }}</th>
                                    <th style="width: 120px;">{{ __('QR Code') }}</th>
                                    <th style="width: 100px;">{{ __('Status') }}</th>
                                    <th style="width: 200px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stations as $station)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($station->logo) }}" class="img-fluid" style="max-width: 30px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('station.show', $station) }}">
                                            {{ $station->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('attendance.index', $station) }}">
                                            {{ $station->attendances->count() }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if (! empty($station->qr_code))
                                            <span data-toggle="modal" data-target="#modal-{{ $station->id }}">
                                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="{{ __('QR Code') }}">
                                                    <i class="fa fa-qrcode"></i>
                                                </a>
                                            </span>

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
                                                            <div class="bg-light p-4">
                                                                <img src="{{ $station->qr_code }}" style="{{ $station->name }}" class="img-fluid shadow">
                                                            </div>

                                                            <div class="mt-3 text-center">
                                                                <a
                                                                    href="{{ route('station.generate', $station) }}"
                                                                    class="btn btn-danger"
                                                                >
                                                                    <i class="fa fa-refresh"></i>
                                                                    {{ __('Re-generate QR Code') }}
                                                                </a>
                                                            </div>
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
                                            <i
                                                class="fa fa-check text-success"
                                                data-toggle="tooltip"
                                                title="{{ __('Active') }}"></i>
                                        @else
                                            <i
                                                class="fa fa-times text-danger"
                                                data-toggle="tooltip"
                                                title="{{ __('In-active') }}"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('attendance.index', $station) }}"
                                            data-toggle="tooltip"
                                            title="{{ __('Records') }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fa fa-user-check"></i>
                                        </a>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a
                                                href="{{ route('sign-in.view', $station) }}"
                                                data-toggle="tooltip"
                                                title="{{ __('View Page') }}"
                                                target="_blank"
                                                class="btn btn-sm btn-secondary">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a
                                                href="{{ route('station.edit', $station) }}"
                                                data-toggle="tooltip"
                                                title="{{ __('Edit') }}"
                                                class="btn btn-sm btn-secondary">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a
                                                href="{{ route('station.destroy', $station) }}"
                                                data-toggle="tooltip"
                                                title="{{ __('Delete') }}"
                                                data-target="#delete-form-{{ $station->id }}"
                                                class="btn btn-sm btn-secondary btn-delete">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </div>

                                        <form id="delete-form-{{ $station->id }}" action="{{ route('station.destroy', $station) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @if ($stations->hasPages())
                            <tfoot>
                                <tr>
                                    <td class="text-center" colspan="5">
                                        {{ $stations->withQueryString()->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                    @endif

                </div>
            </div>
        </div>

{{--        @include('layouts.footers.auth')--}}
    </div>
@endsection
