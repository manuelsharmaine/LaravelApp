@extends('layouts.app')

@section('content')

<div class="container">

    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-warning btn-sm mb-3">Edit</a>
    <div class="card">
        <div class="card-header ">
                {{$post->title}}
        </div>
        <div class="card-body text-center">

            @if (isset($post->photo))
                <div>
                    <img src="{{ asset('/storage/img/'.$post->photo) }}" width="50%">
                </div>                
            @endif
            
                {{$post->description}}
        </div>
    </div>
</div>
    
@endsection