@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Create a new User</div>
	<div class="panel-body">

@include('inc.errors')

		<form action="{{ route('user.store') }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">User Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">User Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">

				<input type="submit" name="create" class="btn btn-primary" value="Add User">
			</div>
		</form>
	</div>
</div>

@stop