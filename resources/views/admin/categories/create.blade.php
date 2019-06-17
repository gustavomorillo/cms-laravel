
@extends('layouts.admin')




@section('content')

<h2>Create Category</h2>

<br>

<form method="post" action="/admin/categories">
<div>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" placeholder="Enter category name" class="form-control">
		{{csrf_field()}}
	</div>	
	

<button type="submit" class="btn btn-primary">Create</button>	
</div>

</form>


@include('includes.form_error')






@endsection