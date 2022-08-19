@extends('layouts.panel')

@section('pageTitle', 'OufGem | Edit E-Wallet')

@section('content')

    <x-header title="Edit E-Wallet" breadcrumb="edit-e-wallet" />


    <section>
        <x-card>
            <x-card.header title="E-Wallet Form">
                <x-button.delete action="{{ route('e-wallets.destroy', [$eWallet]) }}" message="Delete this e-wallet?" />
                <x-button.save form="update-e-wallet-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('e-wallets.update', [$eWallet]) }}" spoof="PUT" id="update-e-wallet-form">
                    <x-input name="name" label="Name" defaultValue="{{ $eWallet->name }}" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
