@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Update category {{$category->name}}</div>
	<div class="panel-body">

@include('inc.errors')


		<form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Tag</label>
				<input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
			</div>
			<div class="form-group text-center">

				<input type="submit" name="update" class="btn btn-success" value="Update">
			</div>
		</form>
	</div>
</div>

@stop