
@extends('layouts.admin')




@section('content')






	<div></div>

	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Id</th>
			<th>Photo</th>
	        <th>Name</th>
	        <th>Email</th>
	        <th>Role</th>
	        <th>Active</th>
	        <th>Created at</th>
	        <th>Updated at</th>
	      </tr>
	    </thead>
	    <tbody>
		
		@if($users)

	    @foreach($users as $user)	
	      <tr>
	        <td>{{$user->id}}</td>
			@if($user->photo)
	        <td><img src="{{$user->photo->file}}"></td>
			@else
			<td>No Photo</td>
			@endif

	        <td>{{$user->name}}</td>
	        <td>{{$user->email}}</td>
	        <td>{{$user->role->name}}</td>
	        <td>{{$user->is_active == 1 ? 'Active' : 'No Active'}}</td>
	        <td>{{$user->created_at->diffForHumans()}}</td>
	        <td>{{$user->updated_at->diffForHumans()}}</td>
	      </tr>
	    @endforeach

	    @endif
	    </tbody>
	  </table>



@endsection