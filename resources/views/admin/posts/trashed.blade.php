@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="panel panel-default">

<div class="panel-heading">
	Trashed Posts
</div>

<div class="panel-body">
<table class="table">

<thead>
	<th>Image</th>
	<th>Title</th>
	<th>Restore</th>
	<th>Delete</th>


</thead>

@if(count($posts)>0)
@foreach($posts as $post)

<tr>
	<td><img src=" {{$post->featured}}" alt="{{$post->title}}" height="50px"></td>
	<td>{{$post->title}}</td>

	<td><a href="{{ route('post.restore',['id'=>$post->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-success">Restore</a></td>

	<td><a href="{{ route('post.kill',['id'=>$post->id]) }}"  onclick="return confirm('Are you sure?')"  class="btn btn-xs btn-danger">Delete</a></td>

</tr>
@endforeach
@else
<tr>
	<th colspan="5" class="text-center">No trashed posts</th>
</tr>

@endif
</table>

</div>

</div>

@endsection