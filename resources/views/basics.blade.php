@foreach($pizzas as $pizza)
	<p>{{$loop->index}} {{ $pizza['type'] }} - {{ $pizza['base'] }} - {{ $pizza['price'] }} </p>

    @if($loop->last)
	<span> - This is the last item</span>
    @endif
    
@endforeach	



