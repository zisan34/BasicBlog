@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Update Site settings</div>
	<div class="panel-body">

@include('inc.errors')


		<form action="{{ route('settings.update') }}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Site Name</label>
				<input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
			</div>
			<div class="form-group">
				<label for="contact_no">Contact Number</label>
				<input type="text" name="contact_no" class="form-control" value="{{$settings->contact_no}}">
			</div>
			<div class="form-group">
				<label for="contact_email">Contact Email</label>
				<input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" class="form-control" value="{{$settings->address}}">
			</div>
			<div class="form-group">

				<input type="submit" name="update" class="btn btn-primary" value="Update Settings">
			</div>
		</form>
	</div>
</div>

@stop