@extends('layout.app')
@section('title') Index @endsection

@section('content');
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    </div>

    <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Create At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post )
                
            <tr>
              <td>{{$post['id']}}</td>
              <td>{{$post['title']}}</td>
              <td>{{$post->user? $post->user->name : 'not found'}}</td>
              <td>{{$post->created_at->format('Y-m')}}</td>
              <td>
                  <a class="btn btn-info" href="{{route('posts.show',$post['id'])}}">View</a>
                  <a class="btn btn-primary" href="{{route('posts.edit',$post['id'])}}">Edit</a>
                  <form method="POST" action="{{route('posts.destroy',$post['id'])}}" style=" display: inline">
                      @csrf
                      @method('DELETE')
                    <button type="submit" class="btn btn-danger " >Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>

@endsection