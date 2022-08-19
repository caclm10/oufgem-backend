@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Payment Method')

@section('content')

    <x-header title="Edit Payment Method" breadcrumb="edit-payment-method" />

    <section>
        <x-card>
            <x-card.header title="Payment Method Form">
                <x-button.delete action="{{ route('payment-methods.destroy', [$paymentMethod]) }}"
                    message="Delete this payment method?" />
                <x-button.save form="edit-payment-method-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('payment-methods.update', [$paymentMethod]) }}" spoof="PUT"
                    id="edit-payment-method-form">
                    <x-input name="name" label="Name" defaultValue="{{ $paymentMethod->name }}" />

                    <x-select name="type" label="Type">
                        @foreach ($methodTypes as $methodType)
                            <option value="{{ $methodType }}" @selected(old('type', $paymentMethod->type) == $methodType)>
                                {{ $methodType }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
