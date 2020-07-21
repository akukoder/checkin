@extends('layouts.app', ['title' => __('Permissions')])

@section('content')
    @include('partials.header', ['title' => 'Permissions', 'class' => 'col-12 col-md-10'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('All Permissions') }}</h3>
                            </div>
                            <div class="col-4 text-md-right">
                                <a href="{{ route('permission.create') }}" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="{{ __('Add New') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (! $permissions->count())
                        <div class="card-body">
                            <div class="text-center text-danger">
                                {{ __('No permission available.') }}
                            </div>
                        </div>
                    @endif

                    @if ($permissions->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>{{ __('Name') }}</th>
                                <th style="width: 100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                                if (request()->has('page') AND request()->page > 1) {
                                    $count = ((request()->page - 1) * setting('item-per-page', 20)) + 1;
                                }
                            @endphp
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a
                                        href="{{ route('permission.edit', $permission) }}"
                                        data-toggle="tooltip"
                                        title="{{ __('Edit') }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a
                                        href="{{ route('permission.destroy', $permission) }}"
                                        class="btn btn-sm btn-secondary btn-delete"
                                        data-toggle="tooltip"
                                        title="{{ __('Delete') }}"
                                        data-target="#permission-form-{{ $permission->id }}"
                                    >
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>

                                    <form id="permission-form-{{ $permission->id }}" action="{{ route('permission.destroy', $permission) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @if ($permissions->hasPages())
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="4">
                                    {{ $permissions->withQueryString()->links() }}
                                </td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
