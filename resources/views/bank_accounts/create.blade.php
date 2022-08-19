@extends('layouts.panel')

@section('pageTitle', 'OufGem | Create Bank Account')

@section('content')

    <x-header title="Create Bank Account" breadcrumb="create-bank-account" />

    <section>
        <x-card>
            <x-card.header title="Bank Account Form">
                <x-button.save form="create-bank-account-form" />
            </x-card.header>

            <x-card.body>
                <x-alert.danger attribute="account" />

                <x-form action="{{ route('bank-accounts.store') }}" id="create-bank-account-form">
                    <x-select name="method" label="Method">
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}" @selected(old('method') == $method->id)>
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </x-select>

                    <x-input name="name" label="Name" />

                    <x-input name="number" label="Number" />
                </x-form>
            </x-card.body>
        </x-card>
    </section>

@endsection
