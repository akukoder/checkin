<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url('{{ $profileImage ?? Storage::url('profile-cover.jpg') }}'); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
        @include('partials.flash')
        <div class="row justify-content-center">
            <div class="{{ $class ?? 'col-12 col-md-8' }}">
                <h1 class="display-2 text-white">{{ __( $title ?? 'Dashboard') }}</h1>
            </div>
        </div>
    </div>
</div>
