@extends('layouts.master')

@section('content')
<h1 class="text-center mt-2">About Page </h1>

@php
    $key = 1;
@endphp


    {{-- Ctrl + / - insert comment --}}
    @guest 
     <p> Hello Welcome to our Page {{$key}}</p>
    @endguest

    @auth
        <p> Name: {{ $name }} </p>
        <p> Address: {{ $address }} </p>
    @endauth

    <p> {!! $html !!} </p> 


    @if(count($cars)) 
        <ul>
            @foreach($cars as $car)
               <li>   {{ $car }} </li>
            @endforeach    
        </ul>
    @else
        No available cars
    @endif

@endsection

@section('script')
<script>
var app = @json($cars);

console.log(app);
    
</script>

@endsection

