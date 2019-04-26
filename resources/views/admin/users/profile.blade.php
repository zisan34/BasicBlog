@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Edit my profile</div>
	<div class="panel-body">

@include('inc.errors')

<form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label for="name">User Name</label>
		<input type="text" name="name" class="form-control" value="{{$user->name}}">
	</div>
	<div class="form-group">
		<label for="email">User Email</label>
		<input type="email" name="email" class="form-control" value="{{$user->email}}">
	</div>

	<div class="form-group">
		<label for="password">User New Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="avatar">New Avatar</label>
		<input type="file" name="avatar">
	</div>

	<div class="form-group">
		<label for="youtube">User Youtube Link</label>
		<input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
	</div>

	<div class="form-group">
		<label for="facebook">User Facebook Link</label>
		<input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
	</div>

	<div class="form-group">
		<label for="content">About</label>
		<textarea name="about" class="form-control" rows="5">{{$user->profile->about}}</textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="update" class="btn btn-primary" value="Update Profile">
	</div>

</form>
	</div>
</div>

@stop