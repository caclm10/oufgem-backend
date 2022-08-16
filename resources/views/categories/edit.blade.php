@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Category')

@section('content')

    <x-header title="Edit Category" breadcrumb="edit-category" />

    <div class="row row-cols-2">
        <section class="col-5">
            <x-card>
                <x-card.header title="Image" />

                <x-card.body>
                    <div class="mb-4 text-center">
                        <img src="{{ $category->image->url ?: asset('images/image-placeholder.png') }}" alt="category image"
                            class="img-fluid thumbnail" id="thumbnail">
                    </div>

                    <div class="d-grid">
                        <x-button.image action="{{ route('categories.images.update', [$category]) }}" target="thumbnail" />
                        <x-button.delete.image class="mt-3 w-100" :hideFirst="!$category->image->url"
                            action="{{ route('categories.images.destroy', [$category]) }}" />
                    </div>
                </x-card.body>
            </x-card>
        </section>

        <section class="col-7">
            <x-card>
                <x-card.header title="Category Form">
                    <x-button.delete action="{{ route('categories.destroy', [$category]) }}"
                        message="Hapus kategori ini?" />
                    <x-button.save form="update-category-form" />
                </x-card.header>

                <x-card.body>
                    <x-form action="{{ route('categories.update', [$category]) }}" spoof="PUT" id="update-category-form">
                        <x-input name="name" label="Name" defaultValue="{{ $category->name }}" />

                        <x-input name="slug" label="Slug" defaultValue="{{ $category->slug }}" disabled />

                        <x-input name="image_home_position" label="Image Home Position"
                            defaultValue="{{ $category->image->home_position }}" />
                    </x-form>
                </x-card.body>
            </x-card>
        </section>
    </div>

@endsection
