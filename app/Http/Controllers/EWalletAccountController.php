<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreEWalletAccountRequest;
use App\Http\Requests\UpdateEWalletAccountRequest;
use App\Models\EWalletAccount;
use Illuminate\Http\Request;

class EWalletAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = EWalletAccount::all();
        return view('ewallet_accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ewallet_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEWalletAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEWalletAccountRequest $request)
    {
        $input = $request->validated();

        $account = new EWalletAccount($input);

        ModelHelper::save($account);

        flashCreated('E-Wallet account');

        return to_route('e-wallets.edit', [$account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EWalletAccount  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(EWalletAccount $account)
    {
        return view('ewallet_accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEWalletAccountRequest  $request
     * @param  EWalletAccount  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEWalletAccountRequest $request, EWalletAccount $account)
    {
        $input = $request->validated();

        $account->fill($input);

        ModelHelper::save($account);

        flashUpdated('E-Wallet');

        return to_route('e-wallets.edit', [$account]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EWalletAccount  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(EWalletAccount $account)
    {
        //
    }
}
