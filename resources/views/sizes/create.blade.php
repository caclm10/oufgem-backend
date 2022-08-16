@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Size')

@section('content')

    <x-header title="Create Size" breadcrumb="create-size" />

    <section>
        <x-card>
            <x-card.header title="Size Form">
                <x-button.save form="create-size-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('sizes.store') }}" id="create-size-form">
                    <x-input name="name" label="Name" />

                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
