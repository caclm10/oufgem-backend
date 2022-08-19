@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit Bank Account')

@section('content')

    <x-header title="Edit Bank Account" breadcrumb="edit-bank-account" />


    <section>
        <x-card>
            <x-card.header title="Bank Account Form">
                <x-button.delete action="{{ route('bank-accounts.destroy', [$bankAccount]) }}"
                    message="Delete this bank account?" />
                <x-button.save form="update-bank-account-form" />
            </x-card.header>

            <x-card.body>
                <x-alert.danger attribute="account" />

                <x-form action="{{ route('bank-accounts.update', [$bankAccount]) }}" spoof="PUT"
                    id="update-bank-account-form">
                    <x-select name="method" label="Method">
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}" @selected(old('method', $bankAccount->payment_method_id) == $method->id)>
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </x-select>

                    <x-input name="name" label="Name" defaultValue="{{ $bankAccount->name }}" />

                    <x-input name="number" label="Number" defaultValue="{{ $bankAccount->number }}" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
