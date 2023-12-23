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
    TAKE ORDER
    <form action="{{ route('storeOrder') }}" method="POST">
    <!-- security tool for cross site scripting -->
    @csrf
        <label for="type">TYPE: </label>
        <select name="type" id="type">
            @foreach($pizzas as $pizza)
                <option value="{{ $pizza->type }}">{{ $pizza->type }}</option>
            @endforeach
        </select>     
        <br>
        <label for="name">NAME: </label>
        <input type="text" name="name">
        <br>
        <label for="quantity">QUANTITY: </label>
        <input type="text" name="quantity">
        <br>
        <label for="paid_amount">PAID AMOUNT: </label>
        <input type="text" name="paid_amount">
        <br>
        <input type="submit" value="ORDER">
    </form>
    <link href="/css/takeOrder.css" rel="stylesheet">
@endsection
