
@extends('layouts.admin')




@section('content')


<form method="post" action="/admin/users" id="create" enctype="multipart/form-data">
<div>
	<div class="form-group">
		<label for="title">User</label>
		<input type="text" name="name" placeholder="Enter user name" class="form-control">
		{{csrf_field()}}
	</div>	
	
	<div class="form-group">
	<label for="title">Email</label>
	<input type="email" name="email" placeholder="Enter email" class="form-control">
	</div>

	<div class="form-group">
	<label for="photo_id">Photo id</label>
	<input type="text" name="photo_id" placeholder="Enter photo_id" class="form-control">
	</div>



	<div class="form-group">
	<label for="role_id">Role</label>
		<select name="role_id" id="create" class="form-control">
			<option value="">Select role</option>
		@foreach ($roles as $id => $role)
			<option value="{{$id}}">{{$role}}</option>
        @endforeach
    	</select>
	</div>

	<div class="form-group">
	<label for="is_active">Status</label>
	<select name="is_active" id="create" class="form-control">
		<option value="1">Active</option>
		<option value="0" selected="selected">Not Active</option>



	</select>
	</div>
	
	<div class="form-group">
	<label for="file">File</label>	
    <input type="file" name="file_upload" >
    </div>   

	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" placeholder="Enter password" class="form-control">
	</div>
<button type="submit" class="btn btn-primary">Submit</button>	
</div>

</form>


@include('includes.form_error')





@endsection

