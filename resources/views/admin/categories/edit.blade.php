
@extends('layouts.admin')




@section('content')

<h2>Update Category</h2>


<form method="post" action="/admin/categories/{{$category->id}}">
<input name="_method" type="hidden" value="PATCH">
<div>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" placeholder="Enter category name" class="form-control" value="{{$category->name}}">
		{{csrf_field()}}
	</div>	
	<div class="button_float">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>

	
</div>

</form>

			<form method="post" action="/admin/categories/{{$category->id}}"  >
			<input name="_method" type="hidden" value="DELETE">
			{{csrf_field()}}

			<button type="submit" class="btn btn-danger" >Delete</button>
			</form>

@include('includes.form_error')





@endsection