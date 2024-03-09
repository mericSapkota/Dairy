<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::where('user_id', Auth::id())->get();
        $location = User::where('id', Auth::id())->get();
        
        return view('order.index', compact('order', 'location'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create($request->except('user_id') + [
            'user_id' => Auth::id()
        ]);
        return redirect('/order');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, $id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, $id)
    {
        $order = Order::find($id);

        $order->update($request->all());

        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, $id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect("/order");
    }
}
