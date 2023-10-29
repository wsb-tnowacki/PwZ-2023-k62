@extends('layout')
@section('tytul')
WSB - O nas
@endsection
@section('podtytul')
O nas
@endsection
@section('tresc')
Treść dla informacji o nas 
<p>
    @isset($zadania)
    <ol>
        @foreach ($zadania as $zadanie)
            <li>{{ $zadanie }}</li>
        @endforeach
    </ol>   
    @endisset
    
</p>
@endsection