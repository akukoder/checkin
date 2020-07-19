@extends('layouts.app', ['title' => __('Dashboard')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ Storage::url('site/profile-cover.jpg') }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>

        <!-- Header container -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <div class="mb-3 icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-laptop"></i>
                            </div>

                            <p>@lang('Stations')</p>

                            <div>
                                <a href="{{ route('station.create') }}" class="btn btn-block btn-info">
                                    @lang('Add Station')
                                </a>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <div class="mb-3 icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                <i class="fa fa-users"></i>
                            </div>

                            <p>@lang('Users')</p>

                            <div>
                                <a href="{{ route('user.create') }}" class="btn btn-block btn-warning">
                                    @lang('Add User')
                                </a>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <div class="card-body text-center">
                            <div class="mb-3 icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="fa fa-users"></i>
                            </div>

                            <p>@lang('Settings')</p>

                            <div>
                                <a href="{{ route('setting.index') }}" class="btn btn-block btn-success">
                                    @lang('Manage')
                                </a>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div><!-- /.row -->

            <!-- Card stats -->
            <div class="row mt-5">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        @lang('Total Stations')
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $stations }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-laptop"></i>
                                    </div>
                                </div>
                            </div>
{{--                            <p class="mt-3 mb-0 text-sm">--}}
{{--                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
{{--                                <span class="text-nowrap">Since last month</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        @lang('Daily Attendances')
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $daily }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
{{--                            <p class="mt-3 mb-0 text-sm">--}}
{{--                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
{{--                                <span class="text-nowrap">Since last month</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        @lang('Monthly Attendances')
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $monthly }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
{{--                            <p class="mt-3 mb-0 text-sm">--}}
{{--                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
{{--                                <span class="text-nowrap">Since last month</span>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>

    <div class="container mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Attendances for last 7 days') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="dashboardChart" width="400" height="100"></canvas>
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        let ctx = $('#dashboardChart')

        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($label) !!},
                datasets: [{
                    label: 'Attendances',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(1, 61, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(1, 61, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
