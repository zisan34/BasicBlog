@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Create a new category</div>
	<div class="panel-body">

@include('inc.errors')

		<form action="{{ route('category.store') }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">

				<input type="submit" name="create" class="btn btn-primary" value="Create">
			</div>
		</form>
	</div>
</div>

@stop