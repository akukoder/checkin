@extends('layouts.app', ['title' => __('Attendances')])

@section('content')
    @include('partials.header', ['title' => 'Attendances', 'class' => 'col-12 col-md-10'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
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
                    <div class="card-body bg-gradient-lighter">
                        <form action="{{ route('attendance.index', $station) }}" method="get" class="row" id="form-filter">
                            @csrf

                            <div class="col-12 col-md-3 mb-2 mb-md-0">
                                <input
                                    type="text"
                                    name="keyword"
                                    class="form-control form-control-sm"
                                    value="{{ $keyword }}"
                                    placeholder="@lang('Enter keyword...')">
                            </div>

                            <div class="col-12 col-md-3 mb-2 mb-md-0">
                                <input
                                    type="date"
                                    name="start"
                                    class="form-control form-control-sm"
                                    value="{{ $start }}">
                            </div>

                            <div class="col-12 col-md-3 mb-2 mb-md-0">
                                <input
                                    type="date"
                                    name="end"
                                    class="form-control form-control-sm"
                                    value="{{ $end }}">
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    @lang('Filter')
                                </button>

                                <a href="{{ route('attendance.index', $station) }}" class="btn btn-secondary btn-sm">
                                    @lang('Reset')
                                </a>

                                <a href="{{ route('attendance.export', $station) }}" class="btn btn-success btn-export btn-sm">
                                    @lang('Export')
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive bg-white">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Telephone')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Time')</th>
                                    <th style="width: 100px;">@lang('Temperature')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                if (request()->has('page') AND request()->page > 1) {
                                    $count = ((request()->page - 1) * setting('item-per-page', 20)) + 1;
                                }
                                @endphp
                                @foreach ($attendances as $attendee)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{!! App\Helpers\Str::highlight($keyword, $attendee->name) !!}</td>
                                    <td>{!! App\Helpers\Str::highlight($keyword, $attendee->telephone) !!}</td>
                                    <td>{{ $attendee->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $attendee->created_at->format('h:i a') }}</td>
                                    <td>{{ $attendee->temperature }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                @if ($attendances->hasPages())
                                <tr class="bg-gradient-lighter">
                                    <td class="text-center" colspan="6">
                                        {{ $attendances->withQueryString()->links() }}
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <td class="text-center" colspan="6">
                                        @lang('Total: ') {{ $total }} @lang('records')
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('.btn-export').click( function (e) {
                e.preventDefault()

                // Get original action
                let action = $('#form-filter').attr('action')

                $('#form-filter')
                    .attr('action', $(this).attr('href'))
                    .submit()

                // Revert action
                setTimeout( function () {
                    $('#form-filter')
                        .attr('action', action)
                }, 1000)
            })
        })
    </script>
@endsection
