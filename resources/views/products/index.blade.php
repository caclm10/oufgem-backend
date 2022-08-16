@extends('layouts.panel')

@section('pageTitle', 'Oufgem | Products')

@section('content')

    <x-header title="Products" breadcrumb="products" />

    <section>
        <x-card>
            <x-card.header title="Product List">
                <x-button.add href="{{ route('products.create') }}" title="Product" />
            </x-card.header>

            <x-card.body>
                <x-table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('products.edit', [$product]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
