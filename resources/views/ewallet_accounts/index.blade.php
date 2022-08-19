@extends('layouts.panel')

@section('pageTitle', 'Oufgem | E-Wallet Accounts')

@section('content')

    <x-header title="E-Wallet Accounts" breadcrumb="e-wallet-accounts" />

    <section>
        <x-card>
            <x-card.header title="E-Wallet Account List">
                <x-button.add href="{{ route('e-wallet-accounts.create') }}" title="E-Wallet Account" />
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
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('e-wallet-accounts.edit', [$account]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
