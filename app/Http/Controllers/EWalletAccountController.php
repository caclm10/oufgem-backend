<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Helpers\PaymentAccountHelper;
use App\Http\Requests\StoreEWalletAccountRequest;
use App\Http\Requests\UpdateEWalletAccountRequest;
use App\Models\EWalletAccount;
use App\Models\PaymentMethod;
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
        $eWalletAccounts = EWalletAccount::all();
        return view('ewallet_accounts.index', compact('eWalletAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $methods = PaymentMethod::eWallet()->get();
        return view('ewallet_accounts.create', compact('methods'));
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

        if (!PaymentAccountHelper::isUnique('e-wallet', $input)) return customValidate(['account' => 'The account has already been taken.']);

        $eWalletAccount = new EWalletAccount([
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'payment_method_id' => $input['method']
        ]);

        ModelHelper::save($eWalletAccount);

        flashCreated('E-Wallet account');

        return to_route('e-wallet-accounts.edit', [$eWalletAccount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EWalletAccount  $eWalletAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(EWalletAccount $eWalletAccount)
    {
        $methods = PaymentMethod::eWallet()->get();
        return view('ewallet_accounts.edit', compact('eWalletAccount', 'methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEWalletAccountRequest  $request
     * @param  EWalletAccount  $eWalletAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEWalletAccountRequest $request, EWalletAccount $eWalletAccount)
    {
        $input = $request->validated();

        if (!PaymentAccountHelper::isUnique('e-wallet', $input, $eWalletAccount->id)) return customValidate(['account' => 'The account has already been taken.']);

        $eWalletAccount->fill([
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'payment_method_id' => $input['method']
        ]);

        ModelHelper::save($eWalletAccount);

        flashUpdated('E-Wallet account');

        return to_route('e-wallet-accounts.edit', [$eWalletAccount]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EWalletAccount  $eWalletAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(EWalletAccount $eWalletAccount)
    {
        if ($eWalletAccount) {
            ModelHelper::delete($eWalletAccount);

            flashDeleted('E-Wallet account');

            return to_route('e-wallet-accounts.index');
        }

        return back();
    }
}
