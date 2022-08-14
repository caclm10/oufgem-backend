@extends('layouts.panel')

@section('pageTitle', 'Oufgem | Categories')

@section('content')

    <x-header title="Categories" breadcrumb="categories" />

    <section>
        <x-card>
            <x-card.header title="Category List">
                <x-button.add href="{{ route('categories.create') }}" title="Category" />
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('categories.edit', [$category]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
