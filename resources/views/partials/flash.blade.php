@if (session()->has('flash_notification'))
    <div class="container-fluid flash {{ isset($class) ? $class : 'mt-5' }} mb-2">
        <div class="row">
            <div class="col">
                @foreach (session('flash_notification', collect())->toArray() as $message)
                    @if ($message['overlay'])
                        @include('flash::modal', [
                            'modalClass' => 'flash-modal',
                            'title'      => $message['title'],
                            'body'       => $message['message']
                        ])
                    @else
                        <div class="alert
                        alert-{{ $message['level'] }}
                        {{ $message['important'] ? 'alert-important' : '' }}"
                             role="alert"
                        >
                            @if ($message['important'])
                                <button type="button"
                                        class="close"
                                        data-dismiss="alert"
                                        aria-hidden="true"
                                >&times;</button>
                            @endif

                            {!! $message['message'] !!}
                        </div>
                    @endif
                @endforeach

            </div>
        </div><!-- /.row -->

        @if ($errors->any())
        <div class="row">
            <div class="col">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endif


