@extends('layouts.panel')

@section('pageTitle', 'Oufgem | Sizes')

@section('content')

    <x-header title="Sizes" breadcrumb="sizes" />

    <section>
        <x-card>
            <x-card.header title="Size List">
                <x-button.add href="{{ route('sizes.create') }}" title="Size" />
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
                        @foreach ($sizes as $size)
                            <tr>
                                <td>{{ $size->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('sizes.edit', [$size]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
