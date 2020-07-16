<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Site Name') }}
    </label>
    <div class="col-md-8">
        <input
            type="text"
            class="form-control"
            name="site-name"
            value="{{ old('site-name', setting('site-name', config('app.name'))) }}"
            required
            autofocus>
    </div>
</div><!-- /.form-group -->

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Site URL') }}
    </label>
    <div class="col-md-8">
        <input
            type="text"
            class="form-control"
            name="site-url"
            value="{{ old('site-url', setting('site-url', config('app.url'))) }}"
            required
        >
    </div>
</div><!-- /.form-group -->
