<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Background color') }}
    </label>
    <div class="col-md-3">
        <div class="input-group color-picker" data-color="{{ setting('qrcode-background-color', 'rgba(255,255,255,0)') }}">
            <input
                type="text"
                class="form-control"
                name="qrcode-background-color"
                id="qrcode-background-color1"
                value="{{ setting('qrcode-background-color', 'rgba(255,255,255,1)') }}"
            >
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
    </div>
</div><!-- /.form-group -->

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Foreground color') }}
    </label>
    <div class="col-md-3">
        <div class="input-group color-picker" data-color="{{ setting('qrcode-foreground-color', 'rgba(0,0,0,1)') }}">
            <input
                type="text"
                class="form-control"
                name="qrcode-foreground-color"
                id="qrcode-foreground-color1"
                value="{{ setting('qrcode-foreground-color', 'rgba(0,0,0,1)') }}"
            >
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
    </div>
</div><!-- /.form-group -->

<div class="form-group row">
    <label class="col-form-label col-md-3">
        {{ __('Show station name in QR Code') }}
    </label>
    <div class="col-md-8">
        <div class="form-check form-check-inline mt-2">
            <input
                class="form-check-input"
                type="radio"
                name="qrcode-show-label"
                id="qrcode-show-label1"
                value="1"
                {{ setting('qrcode-show-label', true) == 1 ? 'checked' : '' }}
            >
            <label class="form-check-label" for="qrcode-show-label1">
                {{ __('Yes') }}
            </label>
        </div>
        <div class="form-check form-check-inline mt-2">
            <input
                class="form-check-input"
                type="radio"
                name="qrcode-show-label"
                id="qrcode-show-label2"
                value="0"
                {{ setting('qrcode-show-label', true) == 0 ? 'checked' : '' }}
            >
            <label class="form-check-label" for="qrcode-show-label2">
                {{ __('No') }}
            </label>
        </div>
    </div>
</div><!-- /.form-group -->
