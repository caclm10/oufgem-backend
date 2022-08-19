@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create E-Wallet')

@section('content')

    <x-header title="Create E-Wallet" breadcrumb="create-e-wallet" />

    <section>
        <x-card>
            <x-card.header title="E-Wallet Form">
                <x-button.save form="create-e-wallet-form" />
            </x-card.header>

            <x-card.body>
                <x-form action="{{ route('e-wallets.store') }}" id="create-e-wallet-form">
                    <x-input name="name" label="Name" />

                    <x-input name="phone_number" label="Phone Number" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
