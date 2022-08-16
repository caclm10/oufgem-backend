@extends('layouts.panel')

@section('pageTitle', 'Oufgem | Types')

@section('content')

    <x-header title="Types" breadcrumb="types" />

    <section>
        <x-card>
            <x-card.header title="Type List">
                <x-button.add href="{{ route('types.create') }}" title="Type" />
            </x-card.header>

            <x-card.body>
                <x-table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->category->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('types.edit', [$type]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
