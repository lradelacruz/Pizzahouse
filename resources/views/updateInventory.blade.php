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
    EDIT INVENTORY
    <form action="/inventory/update/{{ $inventory->id }}" method="POST">
    <!-- security tool for cross site scripting -->
    @csrf
        <label for="base">TYPE: </label>
        <input type="text" name="type" value="{{ $pizzaType }}" readonly>
        <br>
        <label for="cstock">CURRENT STOCK: </label>
        <input type="text" name="current_stock" value="{{ $inventory->current_stock }}">
        <br>
        <input type="submit" value="EDIT">
    </form>
@endsection