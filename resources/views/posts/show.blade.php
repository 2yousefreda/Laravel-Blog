@extends('layout.app')
@section('title') post @endsection

@section('content');
   
    <div class="card text-center">
        <div class="card-header">
          Post info
        </div>
        <div class="card-body">
          <h5 class="card-title">Name: {{$post->user? $post->user->name : 'not found'}} </h5>
          <h5 class="card-title">title: {{$post['title']}}</h5>
          <p class="card-text">Data: {{$post['created_at']}}</p>
          
        </div>
    </div>
    
@endsection