
@extends('layouts.admin')




@section('content')

@if(Session::has('deleted_category'))
<p class="bg-danger">{{session('deleted_category')}}</p>
@elseif(Session::has('created_category'))
<p class="bg-success">{{session('created_category')}}</p>
@elseif(Session::has('updated_category'))
<p class="bg-success">{{session('updated_category')}}</p>
@endif

@if($categories)
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>

	@foreach($categories as $category)

      <tr>
        <td>{{$category->id}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
      
      </tr>

     @endforeach
     
    </tbody>
  </table>
@endif


@endsection