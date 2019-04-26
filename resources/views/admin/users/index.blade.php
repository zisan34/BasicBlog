@extends('layouts.app')

@section('content')

@include('inc.errors')


<div class="panel panel-default">

<div class="panel-heading">
	User
</div>

<div class="panel-body">
<table class="table">

<thead>
	<th>Image</th>
	<th>User Name</th>
	<th>Permission</th>
	<th>Delete</th>


</thead>

@if(count($users)>0)
@foreach($users as $user)

<tr>
	<td>
		<img src="{{ asset($user->profile->avatar) }}" alt="user avatar" height="40px" width="60px" style="border-radius: 50%">
	</td>
	<td>{{$user->name}}</td>
	<td>

		@if($user->admin)
		<a class="btn btn-xs btn-danger" href="{{route('user.tooglePermission',['id'=>$user->id]) }}" onclick="return confirm('Are you sure?')">
		Remove from admin
		</a>
		@else
		<a class="btn btn-xs btn-success" href="{{route('user.tooglePermission',['id'=>$user->id]) }}" onclick="return confirm('Are you sure?')">
		Make admin
		</a>
		@endif


	</td>
	<td>
		@if(Auth::user()->id!=$user->id)
		<a href="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-xs btn-danger">delete</a>
		@endif
	</td>
</tr>
@endforeach
@else
<tr>
	<th colspan="5" class="text-center">No User</th>
</tr>

@endif
</table>
</div>
</div>

@endsection