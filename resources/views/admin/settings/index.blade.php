@extends('layouts.app', ['title' => __('Settings')])

@section('content')
    @include('partials.header', ['title' => 'Settings'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">
                                        @lang('General')
                                    </a>
                                    <a class="nav-item nav-link" id="nav-logo-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-logo" aria-selected="false">
                                        @lang('Logo & Header')
                                    </a>
                                    <a class="nav-item nav-link" id="nav-qrcode-tab" data-toggle="tab" href="#nav-qrcode" role="tab" aria-controls="nav-qrcode" aria-selected="false">
                                        @lang('QR Code')
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                                    <div class="p-4 pt-5">
                                        @include('admin.settings._general-tab')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
                                    <div class="p-4 pt-5">
                                        @include('admin.settings._logo-tab')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-qrcode" role="tabpanel" aria-labelledby="nav-qrcode-tab">
                                    <div class="p-4 pt-5">
                                        @include('admin.settings._qrcode-tab')
                                    </div>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

