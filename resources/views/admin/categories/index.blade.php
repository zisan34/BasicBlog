@extends('layouts.app')

@section('content')

@include('inc.errors')


<div class="panel panel-default">

<div class="panel-heading">
	Categories
</div>

<div class="panel-body">
	<form action="{{ route('category.store') }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group text-center">

				<input type="submit" name="create" class="btn btn-primary" value="Create New Category">
			</div>
		</form>
</div>

<div class="panel-body">

<table class="table">

<thead>
	<th>Name</th>
	<th>Edit</th>
	<th>Delete</th>
</thead>

@if(count($categories)>0)
@foreach($categories as $category)

<tr>
	<td><a href="{{route('category.posts',['id'=>$category->id])}}">{{$category->name}}</a>
		 ({{count($category->posts)}})</td>
	<td><a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
	<td><a href="{{ route('category.delete',['id'=>$category->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">Delete</a></td>

</tr>
@endforeach
@else
<tr>
	<th colspan="5" class="text-center">No Categories</th>
</tr>

@endif
</table>
</div>
</div>

@endsection