@extends('layouts.app')

@section('content')
<div class="container">
        <h1>List of Post</h1>
        <a href="/admin/posts/create" class="btn btn-success">Create Post</a>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Created By </td>
                    <td >Actions </td>
                    <td > </td>
                        
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td> {{$post->id}}</td>
                    <td> {{$post->title}}</td>
                    <td> {{$post->description}} </td>
                    <td> {{$post->user->name}}
                    <td>
                        <a class="btn btn-info btn-sm" href="/admin/posts/{{$post->id}}">View </a>

         
                    </td>
                    <td>
                        <form method="POSt" action="/admin/posts/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        

                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
</div>
    
@endsection