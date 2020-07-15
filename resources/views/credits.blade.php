@extends('layouts.app', ['title' => __('Credits')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ Storage::url('profile-cover.jpg') }}'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <h1 class="display-2 text-white">{{ __('Credits') }}</h1>
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
                                <h3 class="mb-0">{{ __('Credits') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>Icon made by <a href="https://www.flaticon.com/authors/srip" target="_blank">srip</a> from <a href="www.flaticon.com" target="_blank">FlatIcon</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
