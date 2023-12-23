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
    <h1>Inventory</h1>
    
    <p>Below is the list of pizzas currently in our inventory:</p>
    
    <br>
    <table>
        <thead>
            <tr>
                <td>Pizza</td>
                <td>Current Stock</td>
                <td>Status</td>
                <td>Actions</td>
            </tr>
        </thead>

        <tbody>
            @foreach($inventories as $inventory)
            <tr>
                <td> {{ $inventory->type }} </td>
                <td> {{ $inventory->current_stock }}</td>
                <td> @if($inventory->current_stock <= $inventory->critical_no && $inventory->current_stock != 0)
                        CRITICAL
                    @elseif($inventory->current_stock == 0)
                        OUT OF STOCK
                    @else
                        IN STOCK
                    @endif </td>
                <td> <a href="/inventory/update/{{$inventory->id}}">Edit</a>&nbsp;</td>
            </tr>
            @endforeach
        </tbody>        

    </table>
</div>
<link href="/css/inventory.css" rel="stylesheet">
@endsection
