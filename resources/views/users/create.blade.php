@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create User')

@section('content')

    <x-header title="Create User" breadcrumb="create-user" />

    <section>
        <x-card>
            <x-card.header title="User Form">
                <x-button.save form="store-user-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('users.store') }}" id="store-user-form">
                    <x-input name="name" label="Name" />

                    <x-input name="email" label="Email Address" />

                    <x-input type="password" name="password" label="Password" />

                    <x-select name="role_id" label="Role">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id || (!old('role_id') && $role->default))>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
