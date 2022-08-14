@extends('layouts.panel')

@section('pageTitle', 'OufGem | Roles')

@section('content')

    <x-header title="Roles" breadcrumb="roles" />

    <section>
        <x-card>
            <x-card.header title="Role List">
                <x-button.add href="{{ route('roles.create') }}" title="Role" />
            </x-card.header>

            <x-card.body>
                <table class="table table-striped" data-datatables>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Default</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="align-middle text-capitalize">{{ $role->name }}</td>
                                <td>
                                    {{ $role->default ? 'Yes' : 'No' }}
                                </td>
                                <td>
                                    <div class="d-flex space-x">
                                        <x-form action="{{ route('roles.update.default', [$role]) }}" spoof="PUT">
                                            <button class="btn btn-outline-info btn-sm icon icon-left">
                                                <i class="bi bi-gear-wide-connected"></i>
                                                Set as Default
                                            </button>
                                        </x-form>
                                        <x-button.edit href="{{ route('roles.edit', [$role]) }}" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card.body>
        </x-card>
    </section>
@endsection
