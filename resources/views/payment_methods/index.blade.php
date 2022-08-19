@extends('layouts.panel')

@section('pageTitle', 'OufGem | Payment Methods')

@section('content')

    <x-header title="Payment Methods" breadcrumb="payment-methods" />

    <section>
        <x-card>
            <x-card.header title="Payment Method List">
                <x-button.add title="Payment Method" href="{{ route('payment-methods.create') }}" />
            </x-card.header>

            <x-card.body>
                <x-table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentMethods as $method)
                            <tr>
                                <td>{{ $method->name }}</td>
                                <td>{{ $method->type }}</td>
                                <td>
                                    <x-button.edit href="{{ route('payment-methods.edit', [$method]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>

@endsection
