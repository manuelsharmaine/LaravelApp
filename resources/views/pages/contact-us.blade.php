@extends('layouts.master')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif



@if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>    
@endif


<div class="card">
    <div class="card-header">
      Contact Us 
    </div>
    <div class="card-body">
        <form action="/contacts" method="POST">
            @csrf

            {{-- csrf equivalent
                 <input type="hidden" name="_token" value="{{csrf_token() }}"> --}}
            <div class="mb-3">
                <label for="exampleFormControlInput0" class="form-label">Full name</label>
                <input type="text"  value="{{old('fullname')}}" name="fullname" class="form-control" id="exampleFormControlInput0" placeholder="John Doe">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email"  value="{{old('email')}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control"   name="message" id="exampleFormControlTextarea1" rows="3">{{old('message')}}</textarea>
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
  </div>


@endsection