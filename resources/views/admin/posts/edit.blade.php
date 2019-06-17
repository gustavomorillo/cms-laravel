
@extends('layouts.admin')




@section('content')

<div class="row">
		

	

	<div class="col-sm-3">
		
		<img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
	</div>

	<div class="col-sm-9">



<form method="post" action="/admin/posts/{{$post->id}}" id="create" enctype="multipart/form-data">
<input name="_method" type="hidden" value="PATCH">
<div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" placeholder="Enter post title" class="form-control" value="{{$post->title}}">
		{{csrf_field()}}
	</div>	
	

	
	<div class="form-group">
	<label for="category_id">Category</label>
		<select name="category_id" id="create" class="form-control">
			<option value="{{$post->category->id}}">{{$post->category->name}}</option>
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
		<textarea name="body" placeholder="Enter description" class="form-control" rows='7'>{{$post->body}}</textarea>
		
		</div>
			<div style="float: left; margin-right:   20px">
			<button type="submit" class="btn btn-primary">Update post</button>	
		</div>
	</div>

</form>

			<form method="post" action="/admin/posts/{{$post->id}}" id="create" enctype="multipart/form-data">
			<input name="_method" type="hidden" value="DELETE">
			{{csrf_field()}}

			<button type="submit" class="btn btn-danger" >Delete</button>
			</form>

</div>
@include('includes.form_error')





@stop