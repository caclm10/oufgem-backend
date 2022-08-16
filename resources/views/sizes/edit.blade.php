@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Size')

@section('content')

    <x-header title="Edit Size" breadcrumb="edit-size" />


    <section>
        <x-card>
            <x-card.header title="Size Form">
                <x-button.delete action="{{ route('sizes.destroy', [$size]) }}" message="Delete this size?" />
                <x-button.save form="update-size-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('sizes.update', [$size]) }}" spoof="PUT" id="update-size-form">
                    <x-input name="name" label="Name" defaultValue="{{ $size->name }}" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
