@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit E-Wallet')

@section('content')

    <x-header title="Edit E-Wallet" breadcrumb="edit-e-wallet-account" />


    <section>
        <x-card>
            <x-card.header title="E-Wallet Form">
                <x-button.delete action="{{ route('e-wallet-accounts.destroy', [$eWalletAccount]) }}"
                    message="Delete this e-wallet account?" />
                <x-button.save form="update-e-wallet-account-form" />
            </x-card.header>

            <x-card.body>
                <x-alert.danger attribute="account" />

                <x-form action="{{ route('e-wallet-accounts.update', [$eWalletAccount]) }}" spoof="PUT"
                    id="update-e-wallet-account-form">
                    <x-select name="method" label="Method">
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}" @selected(old('method', $eWalletAccount->payment_method_id) == $method->id)>
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </x-select>

                    <x-input name="name" label="Name" defaultValue="{{ $eWalletAccount->name }}" />

                    <x-input name="phone_number" label="Phone Number" defaultValue="{{ $eWalletAccount->phone_number }}" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
