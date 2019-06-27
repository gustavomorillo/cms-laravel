
@extends('layouts.admin')

@yield('styles')


@section('content')

<h2>Upload Photo</h2>


			<form method="post" action="/admin/photos" enctype="multipart/form-data" class="dropzone">
			{{csrf_field()}}
			
			</form>

@stop

@yield('scripts')
