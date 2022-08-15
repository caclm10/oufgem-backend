@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Category')

@section('content')

    <x-header title="Create Category" breadcrumb="create-category" />

    <section>
        <x-card>
            <x-card.header title="Category Form">
                <x-button.save form="create-category-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('categories.store') }}" id="create-category-form" enctype="multipart/form-data">
                    <x-input name="name" label="Name" />

                    <x-input type="file" name="image" label="Image" data-preview-target="image" />
                </x-form>

                <div class="mt-3">
                    <img src="{{ asset('images/image-placeholder.png') }}" alt="image preview" data-preview="image"
                        class="img-thumbnail" width="400" height="400">
                </div>
            </x-card.body>
        </x-card>
    </section>

@endsection
