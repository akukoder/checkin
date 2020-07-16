<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Logo (for dark background)') }}
    </label>
    <div class="col-md-8">
        <input
            type="file"
            class="form-control"
            name="site-logo-white">
    </div>

    <div class="col-md-4 offset-md-3 mt-2">
        <div class="bg-darker p-3">
            <img src="{{ Storage::url(setting('site-logo-white', 'site/logo-default.png')) }}" class="img-fluid">
        </div>
    </div>
</div><!-- /.form-group -->

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Logo (for light background)') }}
    </label>
    <div class="col-md-8">
        <input
            type="file"
            class="form-control"
            name="site-logo-dark">
    </div>

    <div class="col-md-4 offset-md-3 mt-2">
        <div class="bg-lighter p-3">
            <img src="{{ Storage::url(setting('site-logo-dark', 'site/logo-default-dark.png')) }}" class="img-fluid">
        </div>
    </div>
</div><!-- /.form-group -->

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Header Image') }}
    </label>
    <div class="col-md-8">
        <input
            type="file"
            class="form-control"
            name="header-image">
    </div>

    <div class="col-md-6 offset-md-3 mt-2">
        <div class="bg-lighter p-3">
            <img src="{{ Storage::url(setting('header-image', 'site/profile-cover.jpg')) }}" class="img-fluid">
        </div>
    </div>
</div><!-- /.form-group -->
