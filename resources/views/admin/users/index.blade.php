
@extends('layouts.styles')
@extends('layouts.js')

@foreach($users as $user)



	<div id="hola">{{$user->name}}</div>

@endforeach