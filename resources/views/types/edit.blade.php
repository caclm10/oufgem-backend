@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Type')

@section('content')

    <x-header title="Edit Type" breadcrumb="edit-type" />


    <section>
        <x-card>
            <x-card.header title="Type Form">
                <x-button.delete action="{{ route('types.destroy', [$type]) }}" message="Delete this type?" />
                <x-button.save form="update-type-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('types.update', [$type]) }}" spoof="PUT" id="update-type-form">
                    <x-input name="name" label="Name" defaultValue="{{ $type->name }}" />

                    <x-input name="slug" label="Slug" defaultValue="{{ $type->slug }}" disabled />

                    <x-select name="category" label="Category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category', $type->category_id) == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
