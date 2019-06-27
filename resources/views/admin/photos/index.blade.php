
@extends('layouts.admin')

@yield('styles')


@section('content')



@if($photos)

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>File</th>
        <th>Created Date</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img src="{{$photo->file}}" width="100px"></img></td>
        <td>{{$photo->created_at}}</td>
        <td><a href="{{URL::to('admin/photo_delete/'.$photo->id)}}"><i class="far fa-trash-alt"></i></a></td>
      </tr>





	@endforeach
    </tbody>
  </table>
 @endif




@stop

@yield('scripts')