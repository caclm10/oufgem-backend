@extends('layouts.panel')

@section('pageTitle', 'Oufgem | Bank Accounts')

@section('content')

    <x-header title="Bank Accounts" breadcrumb="bank-accounts" />

    <section>
        <x-card>
            <x-card.header title="Bank Account List">
                <x-button.add href="{{ route('bank-accounts.create') }}" title="Bank Account" />
            </x-card.header>

            <x-card.body>
                <x-table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Bank</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bankAccounts as $account)
                            <tr>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->number }}</td>
                                <td>{{ $account->paymentMethod->name }}</td>
                                <td>
                                    <x-button.edit href="{{ route('bank-accounts.edit', [$account]) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card.body>
        </x-card>
    </section>
@endsection
