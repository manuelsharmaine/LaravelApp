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
            
                <div>
                    {{$post->description}}
                </div>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Share Post
                  </button>
        </div>
    </div>
</div>
    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/share-post/{{$post->id}}" method="POSt">
                @csrf

                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                <input type="submit" class="btn btn-success btn-sm">
          </form>
        </div>
      
      </div>
    </div>
  </div>
@endsection