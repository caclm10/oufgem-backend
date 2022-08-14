@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit User')

@section('content')

    <x-header title="Edit User" breadcrumb="edit-user" />

    <section>
        <x-card>
            <x-card.header title="User Form">
                <x-button.delete action="{{ route('users.destroy', [$user]) }}" message="Hapus user ini?" />
                <x-button.save form="update-user-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('users.update', [$user]) }}" spoof="PUT" id="update-user-form">
                    <x-input name="name" label="Name" defaultValue="{{ $user->name }}" />

                    <x-input name="email" label="Email Address" defaultValue="{{ $user->email }}" />

                    <x-input type="password" name="password" label="Password" />

                    <x-select name="role_id" label="Role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
