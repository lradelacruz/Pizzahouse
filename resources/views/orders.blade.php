@extends('layout.layout')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pizzas') }}">Pizzas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('contactUs') }}">Contact Us</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('inventory') }}">Inventory</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('orders') }}">Orders</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <h1>Orders</h1>

        <div><a href="{{ url('takeOrder') }}" class="btn btn-primary">Take Order</a></div>

        <table class="table">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Type</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Total Change</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->pizza_type }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>₱{{ $order->total_amount }}</td>
                        <td>₱{{ $order->paid_amount }}</td>
                        <td>₱{{ $order->change }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <link href="/css/orders.css" rel="stylesheet">
@endsection
