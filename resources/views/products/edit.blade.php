@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Product')

@section('content')

    <x-header title="Edit Product" breadcrumb="edit-product" />


    <div class="row rows-col-2">
        <section class="col">
            <x-card>
                <x-card.header title="Product Form">
                    <x-button.delete action="{{ route('products.destroy', [$product]) }}" message="Delete this product?" />
                    <x-button.save form="update-product-form" />
                </x-card.header>

                <x-card.body>
                    <x-form action="{{ route('products.update', [$product]) }}" spoof="PUT" id="update-product-form">
                        <x-input name="name" label="Name" defaultValue="{{ $product->name }}" />

                        <x-input name="slug" label="Slug" defaultValue="{{ $product->slug }}" disabled />

                        <x-input name="price" label="Price" defaultValue="{{ $product->price }}" />

                        <x-input name="discount" label="Discount" defaultValue="{{ $product->discount }}" />

                        <x-textarea name="description" label="Description">{{ old('description', $product->description) }}
                        </x-textarea>

                        <x-select name="type" label="Type">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type', $product->type_id) == $type->id)>
                                    {{ $type->name }} ({{ $type->category->name }})
                                </option>
                            @endforeach
                        </x-select>
                    </x-form>
                </x-card.body>
            </x-card>
        </section>

        <section class="col">
            <x-card>
                <x-card.header title="Product Sizes Form">
                    <x-button.save form="store-product-size-form" />
                </x-card.header>

                <x-card.body>
                    <x-form action="{{ route('products.sizes.store', [$product]) }}" id="store-product-size-form">
                        <x-select name="size" label="Size">
                            @foreach ($availableSizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </x-select>

                        <x-input name="stock" label="Stock" defaultValue="0" />
                    </x-form>
                </x-card.body>
            </x-card>

            <x-card>
                <x-card.header title="Product Size List"></x-card.header>

                <x-card.body>
                    @foreach ($product->sizes as $size)
                        <div class="row align-items-start mb-3">
                            <x-form spoof="PUT" action="{{ route('products.sizes.update', [$product, $size->size]) }}"
                                class="col-10 row align-items-start" id="update-product-size-form-{{ $size->id }}">
                                <div class="col-7">
                                    <x-input name="size_{{ $size->id }}" defaultValue="{{ $size->size->name }}"
                                        noMargin />
                                </div>
                                <div class="col-5">
                                    <x-input name="stock_{{ $size->id }}" defaultValue="{{ $size->stock }}"
                                        noMargin />
                                </div>
                            </x-form>
                            <div class="col-2 d-flex align-items-start space-x">
                                <button class="btn btn-outline-primary icon"
                                    form="update-product-size-form-{{ $size->id }}">
                                    <i class="bi bi-check2"></i>
                                </button>
                                <x-button.delete action="{{ route('products.sizes.destroy', [$product, $size->size]) }}"
                                    message="Delete this product size?" />
                            </div>
                        </div>
                    @endforeach
                </x-card.body>
            </x-card>
        </section>
    </div>

    <section>
        <x-card>
            <x-card.header title="Product Images">

            </x-card.header>

            <x-card.body>
                <div class="row row-cols-5">
                    <div class="col position-relative h-250px">
                        <x-button.delete formClass="thumbnail-1-delete" :outline="false" circle sm />
                        <img src="{{ asset('images/image-placeholder.png') }}" alt="test"
                            class="img-thumbnail thumbnail-1">
                    </div>
                    <div class="col">
                        <label for="product-image"
                            class="d-flex align-items-center justify-content-center fs-1 border cursor-pointer h-100">+</label>
                    </div>
                </div>

                <input type="file" accept="image/*" class="d-none" id="product-image">
            </x-card.body>
        </x-card>
    </section>

@endsection
