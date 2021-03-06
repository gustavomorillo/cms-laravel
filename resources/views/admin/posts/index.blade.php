
@extends('layouts.admin')




@section('content')

@if(Session::has('deleted_post'))

<p class="bg-danger">{{session('deleted_post')}}</p>

@endif

<h1>Posts</h1>


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Photo </th>
        <th>Owner</th>
        <th>Category</th>
        <th>Content</th>
        <th>Created</th>
        <th>Updated</th>
        <th>View post</th>
        <th>View comments</th>
      </tr>
    </thead>
    <tbody>

	@if($posts)
		@foreach($posts as $post)
		      <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
            <td><img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" width="100px"></td>
		        <td>{{$post->user->name}}</td>
		        <td>{{$post->category->name}}</td>
		        <td class="col-sm-3">{{str_limit($post->body, 30)}}</td>
		        <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('home.post',$post->id) }}">View post</a></td>
            <td><a href="{{route('comments.show', $post->id) }}">View comments</a></td>
            
		      </tr>
		@endforeach
	@endif
    </tbody>
  </table>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">

    {{$posts->render()}}
  </div>
  </div>


@stop