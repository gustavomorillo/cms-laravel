
@extends('layouts.admin')




@section('content')





<form method="post" action="/admin/posts" id="create" enctype="multipart/form-data">
<div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" placeholder="Enter post title" class="form-control">
		{{csrf_field()}}
	</div>	
	

	<div class="form-group">
	

	<div class="form-group">
	<label for="category_id">Category</label>
		<select name="category_id" id="create" class="form-control">
			@foreach ($categories as $id => $category)
			<option value="{{$id}}">{{$category}}</option>
        	@endforeach
    	</select>
	</div>

	<div class="form-group">
		<label for="photo_id">Photo</label>	
    	<input type="file" name="photo_id" >
    </div> 

	<div class="form-group">
		<label for="body">Description</label>
		<textarea name="body" placeholder="Enter description" class="form-control" rows='7'></textarea>
	</div>
	
	<button type="submit" class="btn btn-primary">Create post</button>	
</div>

</form>

@include('includes.form_error')





@stop