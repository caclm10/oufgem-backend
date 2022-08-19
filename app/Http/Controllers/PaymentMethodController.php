<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        $methodTypes = PaymentMethod::METHOD_TYPES;
        return view('payment_methods.create', compact('methodTypes'));
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $input = $request->validated();

        $paymentMethod = new PaymentMethod($input);

        ModelHelper::save($paymentMethod);

        flashCreated('Payment method');

        return to_route('payment-methods.edit', [$paymentMethod]);
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        $methodTypes = PaymentMethod::METHOD_TYPES;
        return view('payment_methods.edit', compact('paymentMethod', 'methodTypes'));
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $input = $request->validated();

        $paymentMethod->fill($input);

        ModelHelper::save($paymentMethod);

        flashUpdated('Payment method');

        return to_route('payment-methods.edit', [$paymentMethod]);
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        if ($paymentMethod) {
            ModelHelper::delete($paymentMethod);

            flashDeleted('Payment method');

            return to_route('payment-methods.index');
        }

        return back();
    }
}
