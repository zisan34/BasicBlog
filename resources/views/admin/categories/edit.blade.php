@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Update category {{$category->name}}</div>
	<div class="panel-body">

@include('inc.errors')


		<form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{$category->name}}">
			</div>
			<div class="form-group">

				<input type="submit" name="update" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>
</div>

@stop