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
        <a class="nav-link" href="{{ url('create') }}">Create</a>
    </li>
@endsection

@section('content')
<div class="content">
    <h1 class="title">Pizza List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Base</th>
                <th>Name</th>
                <th>Price</th>
                <th>Created On</th>
                <th>Updated On</th>
                <th>ACTIONS</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza->id }}</td>
                    <td>{{ $pizza->type }}</td>
                    <td>{{ $pizza->base }}</td>
                    <td>{{ $pizza->name }}</td>
                    <td>{{ $pizza->price }}</td>
                    <td>{{ $pizza->created_at }}</td>
                    <td>{{ $pizza->updated_at }}</td>
                    <td>
                        <a href="/pizzas/edit/{{ $pizza->id }}" class="action-link">Edit</a>
                        <form action="/pizzas/delete/{{ $pizza->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="delete" value="Delete" class="action-button">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<link href="/css/main.css" rel="stylesheet">
@endsection
