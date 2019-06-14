
@extends('layouts.admin')




@section('content')

<div class="row">
		

	

	<div class="col-sm-3">
		
		<img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
	</div>

	<div class="col-sm-9">


<form method="post" action="/admin/users/{{$user->id}}" id="create" enctype="multipart/form-data">
	<input name="_method" type="hidden" value="PATCH">
<div>
			<div class="form-group">
				<label for="title">User</label>
				<input type="text" name="name" value="{{$user->name}}" class="form-control">
				{{csrf_field()}}
			</div>	
	
			<div class="form-group">
			<label for="title">Email</label>
			<input type="email" name="email" value="{{$user->email}}" class="form-control">
			</div>



		 	<div class="form-group">
			<label for="role_id">Role</label>
				<select name="role_id" id="create" class="form-control">
					@if($user->role->name == 'administrator')
					<option value="1" selected="selected">administrator</option>
					<option value="2" >author</option>
					<option value="3" >subscriber</option>
					@elseif($user->role->name == 'author')

					<option value="2" selected="selected">author</option>
					<option value="1" >administrator</option>
					<option value="3" >subscriber</option>
					
					@else

					<option value="3" selected="selected">subscriber</option>
					<option value="1" >administrator</option>
					<option value="2" >author</option>

					@endif
		    	</select>
			</div> 

			<div class="form-group">
			<label for="is_active">Status</label>
			<select name="is_active" id="create" class="form-control">

			@if($user->is_active == 1)
			<option value="1" selected="selected">Active</option>
			<option value="0" >Not Active</option>	
			@else
			<option value="1" >Active</option>
			<option value="0" selected="selected">Not Active</option>
			@endif



			</select>
			</div>

	
			<div class="form-group">
			<label for="photo_id">Photo</label>	
		    <input type="file" name="photo_id" >
		    </div>   

			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Enter password" class="form-control">
			</div>
			<div style="float: left; margin-right:   20px">
			<button type="submit" class="btn btn-primary">Update</button>	

			</div>
			

		</div>

</form>



			<form method="post" action="/admin/users/{{$user->id}}" id="create" enctype="multipart/form-data">
			<input name="_method" type="hidden" value="DELETE">
			{{csrf_field()}}

			<button type="submit" class="btn btn-danger" >Delete</button>
			</form>

</div>
</div>

@include('includes.form_error')






@endsection

