@extends('layouts.app', ['title' => __('Attendances')])

@section('content')
    @include('partials.header', ['title' => 'Attendances', 'class' => 'col-12 col-md-6'])

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
                    <div class="table-reponsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Telephone')</th>
                                    <th style="width: 100px;">@lang('Temperature')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                if (request()->has('page') AND request()->page > 1) {
                                    $count = ((request()->page - 1) * 15) + 1;
                                }
                                @endphp
                                @foreach ($attendances as $attendee)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $attendee->name }}</td>
                                    <td>{{ $attendee->telephone }}</td>
                                    <td>{{ $attendee->temperature }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            @if ($attendances->hasPages())
                            <tfoot>
                                <tr>
                                    <td class="text-center" colspan="4">
                                        {{ $attendances->withQueryString()->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
