@extends('layouts.app', ['title' => __('Users')])

@section('content')
    @include('partials.header', ['title' => 'Users', 'class' => 'col-12 col-md-10'])

    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('All Users') }}</h3>
                            </div>
                            <div class="col-4 text-md-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="{{ __('Add New') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (! $users->count())
                        <div class="card-body">
                            <div class="text-center text-danger">
                                {{ __('No user available.') }}
                            </div>
                        </div>
                    @endif

                    @if ($users->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Roles') }}</th>
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
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    {{ $user->name }}
                                    @if (auth()->user()->id === $user->id)
                                        <span class="badge badge-danger ml-2">{{ __('You') }}</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role_list }}
                                </td>
                                <td>
                                    <a
                                        href="{{ route('user.edit', $user) }}"
                                        data-toggle="tooltip"
                                        title="{{ __('Edit') }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    @if (auth()->user()->id !== $user->id)
                                    <a
                                        href="{{ route('user.destroy', $user) }}"
                                        class="btn btn-sm btn-secondary btn-delete"
                                        data-toggle="tooltip"
                                        title="{{ __('Delete') }}"
                                        data-target="#user-form-{{ $user->id }}"
                                    >
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                    @endif

                                    <form id="user-form-{{ $user->id }}" action="{{ route('user.destroy', $user) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @if ($users->hasPages())
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="5">
                                    {{ $users->withQueryString()->links() }}
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
