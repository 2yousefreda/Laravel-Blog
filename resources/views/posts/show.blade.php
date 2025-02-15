@extends('layout.app')
@section('title') post @endsection

@section('content')

<?php
$path=Storage::url($post->image);
?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4" >
      <img src="{{$path  }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Name: {{$post->user? $post->user->name : 'not found'}}</h5>
        <h5 class="card-title">title: {{$post['title']}}</h5>
        <p class="card-text">Description: {{$post->description}}</p>
        <p class="card-text"><small class="text-body-secondary">Data: {{$post['created_at']}}</small></p>
      </div>
    </div>
  </div>
</div>


   
    {{-- <div class="card text-center">
        <div class="card-header">
          Post info
        </div>
        <div class="card-body">
          <h5 class="card-title">Name: {{$post->user? $post->user->name : 'not found'}} </h5>
          <h5 class="card-title">title: {{$post['title']}}</h5>
          <p class="card-text">Description: {{$post->description}}</p>
          <p class="card-text">Data: {{$post['created_at']}}</p>
          
        </div>
    </div> --}}
    
@endsection