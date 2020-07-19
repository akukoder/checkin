<div class="row align-items-center justify-content-between">
    <div class="col-md-6">
        <div class="copyright text-muted">
            &copy; {{ now()->year }} {{ config('app.name') }}
        </div>
    </div>

    <div class="col-md-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
                <a href="https://www.syahzul.com" class="nav-link" target="_blank">CheckIn</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('docs.index') }}" class="nav-link">
                    {{ __('Documentation') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('credits') }}" class="nav-link">
                    {{ __('Credits') }}
                </a>
            </li>
        </ul>
    </div>
</div>
