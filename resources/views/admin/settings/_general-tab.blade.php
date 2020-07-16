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

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Sign-in Interval') }}
    </label>
    <div class="col-md-3">
        <input
            type="number"
            class="form-control"
            name="sign-in-interval"
            value="{{ old('sign-in-interval', setting('sign-in-interval', 5)) }}"
            required
            autofocus>
    </div>
    <div class="col-md-8 offset-md-3">
        <span class="small">
            @lang('Specify the number of minutes that you wish for each sign-in session from the same user.')
        </span>
    </div>
</div><!-- /.form-group -->
