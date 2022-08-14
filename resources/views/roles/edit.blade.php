@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Role')

@section('content')

    <x-header title="Edit Role" breadcrumb="edit-role" />

    <section>
        <x-card>
            <x-card.header title="Role Form">
                <x-button.delete action="{{ route('roles.destroy', [$role]) }}" message="Hapus role ini?" />
                <x-button.save form="update-role-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('roles.update', [$role]) }}" spoof="PUT" id="update-role-form">
                    <x-input name="name" label="Name" :defaultValue="$role['name']" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
