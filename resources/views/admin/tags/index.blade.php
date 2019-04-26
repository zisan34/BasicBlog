@extends('layouts.app')

@section('content')

@include('inc.errors')


<div class="panel panel-default">

<div class="panel-heading">
	Tags
</div>
<div class="panel-body">
	
	<form action="{{ route('tag.store') }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Create tag</label>
				<input type="text" name="tag" class="form-control">
			</div>
			<div class="form-group text-center">

				<input type="submit" name="create" class="btn btn-success" value="Store Tag">
			</div>
		</form>
</div>
<div class="panel-body">

<table class="table">

<thead>
	<th>Tag</th>
	<th>Edit</th>
	<th>Delete</th>
</thead>

@if(count($tags)>0)
@foreach($tags as $tag)

<tr>
	<td>{{$tag->tag}}</td>
	<td><a href="{{ route('tag.edit',['id'=>$tag->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
	<td><a href="{{ route('tag.delete',['id'=>$tag->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">Delete</a></td>

</tr>
@endforeach
@else
<tr>
	<th colspan="5" class="text-center">No Tags</th>
</tr>

@endif
</table>
</div>
</div>

@endsection