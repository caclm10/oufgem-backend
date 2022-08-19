@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Payment Method')

@section('content')

    <x-header title="Create Payment Method" breadcrumb="create-payment-method" />

    <section>
        <x-card>
            <x-card.header title="Payment Method Form">
                <x-button.save form="create-payment-method-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('payment-methods.store') }}" id="create-payment-method-form">
                    <x-input name="name" label="Name" />

                    <x-select name="type" label="Type">
                        @foreach ($methodTypes as $methodType)
                            <option value="{{ $methodType }}">{{ $methodType }}</option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
