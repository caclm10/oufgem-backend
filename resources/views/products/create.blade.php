@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Product')

@section('content')

    <x-header title="Create Product" breadcrumb="create-product" />

    <section>
        <x-card>
            <x-card.header title="Product Form">
                <x-button.save form="create-product-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('products.store') }}" id="create-product-form">
                    <x-input name="name" label="Name" />

                    <x-input name="price" label="Price" />

                    <x-input name="discount" label="Discount" />

                    <x-textarea name="description" label="Description"></x-textarea>

                    <x-select name="type" label="Type">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }} ({{ $type->category->name }})</option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
