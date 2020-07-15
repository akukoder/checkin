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
                    <div class="card-body">
                        <ul class="mt-3">
                            <li>Laravel Framework by <a href="https://laravel.com" target="_blank">Laravel</a></li>
                            <li>Argon Theme by <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Creative Tim</a></li>
                            <li>Icon made by <a href="https://www.flaticon.com/authors/srip" target="_blank">srip</a> from <a href="https://www.flaticon.com" target="_blank">FlatIcon</a></li>
                            <li>Font Awesome Icon by <a href="https://fontawesome.com" target="_blank">FontAwesome</a></li>
                            <li>Image by <a href="https://pixabay.com/users/Free-Photos-242387/" target="_blank">Free-Photos</a> from <a href="https://pixabay.com/" target="_blank">Pixabay</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
