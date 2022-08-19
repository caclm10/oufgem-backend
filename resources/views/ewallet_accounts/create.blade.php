@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create E-Wallet Account')

@section('content')

    <x-header title="Create E-Wallet Account" breadcrumb="create-e-wallet-account" />

    <section>
        <x-card>
            <x-card.header title="E-Wallet Account Form">
                <x-button.save form="create-e-wallet-account-form" />
            </x-card.header>

            <x-card.body>
                <x-alert.danger attribute="account" />

                <x-form action="{{ route('e-wallet-accounts.store') }}" id="create-e-wallet-account-form">
                    <x-select name="method" label="Method">
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}" @selected(old('method') == $method->id)>
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </x-select>

                    <x-input name="name" label="Name" />

                    <x-input name="phone_number" label="Phone Number" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
