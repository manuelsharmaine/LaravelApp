@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">
                <form action="/admin/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label"> Title </label>
                        <input type="text" value="{{$post->title}}" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Description </label>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>

        </div>
    </div>
</div>
    
    
@endsection