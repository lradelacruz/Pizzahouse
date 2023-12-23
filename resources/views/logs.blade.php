@extends('layout.layout')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pizzas') }}">Pizzas</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <h2>Logs</h2>

        <div class="mb-3">
            <form action="{{ route('clearLogs') }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Clear Logs</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>IP Address</th>
                    <th>Activity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->username }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->activity }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <link href="/css/logs.css" rel="stylesheet">
@endsection
