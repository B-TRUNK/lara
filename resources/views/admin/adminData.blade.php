{{ __('message.welcome')}}

<br>

@if($data[0] == 'Divo')
    <p>Bebo ,uou have two sons:</p>
    @else
    <p>Laravel</p>
@endif

@forelse($data as $datum)
<p>{{ $datum }}</p>
@empty
<p>Empty Array</p>
@endforelse





