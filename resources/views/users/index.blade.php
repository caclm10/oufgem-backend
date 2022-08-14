@extends('layouts.panel')

@section('pageTitle', 'OufGem | Users')

@section('content')

    <x-header title="Users" breadcrumb="users" />

    <section>
        <x-card>
            <x-card.header title="User List">
                <x-button.add title="User" href="{{ route('users.create') }}" />
            </x-card.header>

            <x-card.body>
                <x-table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-capitalize">{{ $user->role->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('users.edit', [$user]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>

@endsection
