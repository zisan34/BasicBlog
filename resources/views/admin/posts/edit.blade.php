@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Edit post</div>
<div class="panel-body">

@include('inc.errors')

<form action="{{ route('post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" value="{{$post->title}}">
	</div>
	
	<div class="form-group">
		<label for="category">Select a Category</label>
		<select name="category_id" id="category_id" class="form-control">
			@foreach($categories as $category)
			<option value="{{$category->id}}"
			@if($post->category_id==$category->id)
			 selected
			@endif
			>{{$category->name}}</option>
			@endforeach
		</select>
	</div>


	<div class="form-group">
		<label>Select tags</label>	
			@foreach($tags as $tag)
		<div class="checkbox">		
			<label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
			@foreach($post->tags as $t)
				@if($tag->id==$t->id)
				checked
				@endif 
			@endforeach
				>{{$tag->tag}}</label>
		</div>
			@endforeach
	</div>

	<div class="form-group">

		<label for="featured">Featured image</label>
		<input type="file" name="featured">
	</div>
	<div class="form-group">

		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control" rows="5">{{$post->content}}</textarea>
	</div>
	<input type="hidden" name="user_id" value={{$user_id}}>
	<div class="form-group">

		<input type="submit" name="submit" class="btn btn-primary" value="Update">
	</div>
</form>
</div>
</div>

@stop

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<script>
$(document).ready(function(){
	$('#content').summernote({
		height:200
	});
});

</script>
@endsection