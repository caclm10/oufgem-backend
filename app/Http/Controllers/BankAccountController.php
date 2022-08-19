<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Helpers\PaymentAccountHelper;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use App\Models\BankAccount;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = BankAccount::with('paymentMethod')->get();
        return view('bank_accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $methods = PaymentMethod::bank()->get();
        return view('bank_accounts.create', compact('methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBankAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankAccountRequest $request)
    {
        $input = $request->validated();

        if (!PaymentAccountHelper::isUnique('bank', $input)) return customValidate(['account' => 'The account has already been taken.']);

        $bankAccount = new BankAccount([
            'name' => $input['name'],
            'number' => $input['number'],
            'payment_method_id' => $input['method']
        ]);

        ModelHelper::save($bankAccount);

        flashCreated('Bank account');

        return to_route('bank-accounts.edit', [$bankAccount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        $methods = PaymentMethod::bank()->get();
        return view('bank_accounts.edit', compact('bankAccount', 'methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBankAccountRequest  $request
     * @param  BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $input = $request->validated();

        if (!PaymentAccountHelper::isUnique('bank', $input, $bankAccount->id)) return customValidate(['account' => 'The account has already been taken.']);

        $bankAccount->fill([
            'name' => $input['name'],
            'number' => $input['number'],
            'payment_method_id' => $input['method']
        ]);

        ModelHelper::save($bankAccount);

        flashUpdated('Bank account');

        return to_route('bank-accounts.edit', [$bankAccount]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        if ($bankAccount) {
            ModelHelper::delete($bankAccount);

            flashDeleted('Bank account');

            return to_route('bank-accounts.index');
        }

        return back();
    }
}
