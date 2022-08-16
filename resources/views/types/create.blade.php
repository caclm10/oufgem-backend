@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Type')

@section('content')

    <x-header title="Create Category" breadcrumb="create-type" />

    <section>
        <x-card>
            <x-card.header title="Type Form">
                <x-button.save form="create-type-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('types.store') }}" id="create-type-form">
                    <x-input name="name" label="Name" />

                    <x-select name="category" label="Category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
