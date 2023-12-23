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
        <h1>Contact Us</h1>
        
        <p>If you have any questions or feedback, please feel free to reach out to us using the information below:</p>
        
        <address>
            <strong>Pizza House</strong><br>
            123 Street<br>
            Brgy, City 1550<br>
            <abbr title="Phone">Phone:</abbr> 09123456789<br>
            <a href="">Email: pizzahouse@gmail.com</a>
        </address>
        
        <p>You can also use the contact form to send us a message:</p>
        
        <form method="POST" action="{{ route('submitContact') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>
            
            <button type="submit" style="background-color: #ea1f49; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
        </form>
    </div>
    <link href="/css/contactUs.css" rel="stylesheet">
@endsection