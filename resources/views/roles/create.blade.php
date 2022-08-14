@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Role')

@section('content')

    <x-header title="Create Role" breadcrumb="create-role" />

    <section>
        <x-card>
            <x-card.header title="Role Form">
                <x-button.save form="store-role-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('roles.store') }}" id="store-role-form">
                    <x-input name="name" label="Name" />

                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
