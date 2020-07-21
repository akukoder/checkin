@extends('layouts.app', ['title' => __('Roles')])

@section('content')
    @include('partials.header', ['title' => 'Roles', 'class' => 'col-12 col-md-10'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('All Roles') }}</h3>
                            </div>
                            <div class="col-4 text-md-right">
                                <a href="{{ route('role.create') }}" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="{{ __('Add New') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (! $roles->count())
                        <div class="card-body">
                            <div class="text-center text-danger">
                                {{ __('No role available.') }}
                            </div>
                        </div>
                    @endif

                    @if ($roles->count())
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
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a
                                        href="{{ route('role.edit', $role) }}"
                                        data-toggle="tooltip"
                                        title="{{ __('Edit') }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a
                                        href="{{ route('role.destroy', $role) }}"
                                        class="btn btn-sm btn-secondary btn-delete"
                                        data-toggle="tooltip"
                                        title="{{ __('Delete') }}"
                                        data-target="#role-form-{{ $role->id }}"
                                    >
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>

                                    <form id="role-form-{{ $role->id }}" action="{{ route('role.destroy', $role) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @if ($roles->hasPages())
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="4">
                                    {{ $roles->withQueryString()->links() }}
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
