<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\FileStorage;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use FileStorage;

    public function index()
    {

        $payment = Payment::where('user_id', Auth::id())->get();

        return view("payment.index", compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $payment = Order::find($id);
        return view('payment.pay', compact('payment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $payment = Payment::create($request->except('user_id', 'ss') +
            ['user_id' => Auth::id()] +
            [
                'ss' => $this->storeFile("payment/images", $request->file('ss'))
            ] + ['mode' => 'online']);
        return redirect('/payment');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
