@extends('layout.layout')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pizzas') }}">Pizzas</a>
    </li>
@endsection

@section('content')
    CREATE A NEW PIZZA
    <form action="/pizzas" method="POST">
    <!-- security tool for cross site scripting -->
    @csrf
        <label for="base">TYPE: </label>
        <input type="text" name="type">
        <br>
        <label for="base">BASE: </label>
        <input type="text" name="base">
        <br>
        <label for="base">NAME: </label>
        <input type="text" name="name">
        <br>
        <label for="base">PRICE: </label>
        <input type="text" name="price">
        <br>
        <input type="submit" value="CREATE">
    </form>
    <link href="/css/create.css" rel="stylesheet">
@endsection