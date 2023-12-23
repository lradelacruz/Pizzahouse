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
    <li class="nav-item">
        <a class="nav-link" href="{{ url('logs') }}">Logs</a>
    </li>
@endsection