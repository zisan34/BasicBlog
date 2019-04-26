@extends('layouts.app')

@section('content')

@include('inc.errors')


<div class="panel panel-default">

<div class="panel-heading">
	Published Posts
</div>

<div class="panel-body">
<table class="table">

<thead>
	<th>Image</th>
	<th>Title</th>
	<th>Edit</th>
	<th>Delete</th>


</thead>

@if(count($posts)>0)
@foreach($posts as $post)

<tr>
	<td><img src=" {{$post->featured}}" alt="{{$post->title}}" height="50px"></td>
	<td>{{$post->title}}</td>

	<td><a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-xs btn-info">Edit</a></td>

	<td><a href="{{ route('post.delete',['id'=>$post->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">Trash</a></td>

</tr>
@endforeach
@else
<tr>
	<th colspan="5" class="text-center">No published posts</th>
</tr>

@endif
</table>
</div>
</div>

@endsection