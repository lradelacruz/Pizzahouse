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
    EDIT PIZZA
    <form action="/pizzas/editPizza/{{$pizza->id}}" method="POST">
    <!-- security tool for cross site scripting -->
    @csrf
        <label for="base">TYPE: </label>
        <input type="text" name="type" value="{{$pizza->type}}">
        <br>
        <label for="base">BASE: </label>
        <input type="text" name="base" value="{{$pizza->base}}">
        <br>
        <label for="base">NAME: </label>
        <input type="text" name="name" value="{{$pizza->name}}">
        <br>
        <label for="base">PRICE: </label>
        <input type="text" name="price" value="{{$pizza->price}}">
        <br>
        <input type="submit" value="EDIT">
    </form>
@endsection