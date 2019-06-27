
@extends('layouts.admin')




@section('content')

<h1>Comments</h1>

@if(count($comments) > 0)
<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Email</th>
      <th>Content</th>
      <th>Created At</th>
      <th>View Post</th>
      <th>View replies</th>
      <th>Status</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)

    <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->author}}</td>
      <td>{{$comment->email}}</td>
      <td class="col-md-2">{{$comment->body}}</td>
      <td>{{$comment->created_at->diffForHumans()}}</td>
      <td><a href="{{route('home.post',$comment->post->id) }}">View post</a></td>
      <td><a href="{{route('replies.show',$comment->id) }}">View replies</a></td>

      <td>

        @if($comment->is_active == 1)

        <form method="post" action="/admin/comments/{{$comment->id}}">
          <input name="_method" type="hidden" value="PATCH">
          <input type="hidden" name="is_active" value="0">

          {{csrf_field()}}

          <div class="form-group">
          
            <button type="submit" class="btn btn-success" >Un-approve</button>
  
          </div>

        </form>
          
        @else

        <form method="post" action="/admin/comments/{{$comment->id}}">
          <input name="_method" type="hidden" value="PATCH">
          <input type="hidden" name="is_active" value="1">

          {{csrf_field()}}

          <div class="form-group">
          
            <button type="submit" class="btn btn-info" >Approve</button>
  
          </div>
         
        </form>

          
        @endif
      </td>

      <td>


            <form method="post" action="/admin/comments/{{$comment->id}}">
            <input name="_method" type="hidden" value="DELETE">
            {{csrf_field()}}
      
            <button type="submit" class="btn btn-danger" >Delete</button>
            </form>




      </td>
      
    </tr>

    @endforeach
   
  </tbody>
</table>
@else

<h2>No comments</h2>

@endif



@stop