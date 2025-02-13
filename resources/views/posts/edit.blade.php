@extends('layout.app')
@section('title') Edit @endsection

@section('content')

<!-- /resources/views/post/create.blade.php -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->

<form method="POST" action="{{route('posts.update',$post->id)}}" >
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" value="{{$post->title}}" class="form-control" >
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" >{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
    <label for="post_Creator" class="form-label">post Creator</label>
      <select name="post_creator" class="form-control">
        @foreach ($users as $user )
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>

  </form>

@endsection