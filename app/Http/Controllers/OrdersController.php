<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Log;
use App\Models\Pizza;
use App\Models\Inventory;

class OrdersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    public function takeOrder()
    {
        $pizzas = Pizza::all();
        return view('takeOrder', compact('pizzas'));
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric|min:1',
            'paid_amount' => 'required|numeric|min:0',
        ]);
    
        // Find the pizza based on type
        $pizza = Pizza::where('type', $request->type)->first();
    
        // Check if pizza is found
        if (!$pizza) {
            return redirect('/takeOrder')->with('error', 'Pizza not found.');
        }
    
        // Calculate total amount based on pizza price and quantity
        $totalAmount = $pizza->price * $request->quantity;
    
        // Calculate change
        $change = $request->paid_amount - $totalAmount;
    
        // Check if there is enough inventory
        $availableStock = $pizza->inventory->current_stock;
        if ($request->quantity > $availableStock) {
            return redirect('/takeOrder')->with('error', 'Not enough stock available.');
        }
    
        // Update inventory
        $pizza->inventory->decrement('current_stock', $request->quantity);
    
        // Store order in the database
        $order = new Order();
        $order->pizza_type = request('type');
        $order->customer_name = request('name');
        $order->total_amount = $totalAmount;
        $order->paid_amount = request('paid_amount');
        $order->change = $change;
        $order->save();
    
        $log = new Log();
        $log->username = Auth::user()->name;
        $log->ip = \Request::ip();
        $log->activity = $order->customer_name ." ordered a pizza!";
        $log->save();
    
        return redirect('/orders')->with('success', 'Order created successfully.');
    }
       
}
