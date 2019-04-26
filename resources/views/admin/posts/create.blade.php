@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Create a new post</div>
<div class="panel-body">

@include('inc.errors')

<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control"  value="{{old('title')}}">
	</div>
	
	<div class="form-group">
		<label for="category">Select a Category</label>
		<select name="category_id" id="category_id" class="form-control">
			@foreach($categories as $category)
			

			<option value="{{$category->id}}" 
				@if(old('category_id')==$category->id)
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
			@foreach (old('tags') as $old_tag)
			@if($old_tag==$tag->id)
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
		<textarea name="content" id="content" class="form-control" rows="10">{{old('content')}}</textarea>
	</div>
	<input type="hidden" name="user_id" value={{$user_id}}>
	<div class="form-group">

		<input type="submit" name="submit" class="btn btn-primary" value="Submit">
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
		// toolbar: [
  //   // [groupName, [list of button]]
	 //    ['style', ['bold', 'italic', 'underline', 'clear']],
	 //    ['font', ['strikethrough', 'superscript', 'subscript']],
	 //    ['fontsize', ['fontsize']],
	 //    ['color', ['color']],
	 //    ['para', ['ul', 'ol', 'paragraph']],
	 //    ['height', ['height']],
	 //    ['table'],
	 //    ['undo'],
	 //    ['redo'],
	 //    ['codeview']
	 //  ]

	 maximumImageFileSize: 524288
	});
});

</script>
@endsection