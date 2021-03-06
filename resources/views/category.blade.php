@extends('layouts.frontEnd')

@section('content')
<!-- ... End Header -->


<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category: {{$category->name}}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            

<?php
$colcount=count($category->posts);
$i=1;
?>

<div class="row">
@foreach($category->posts as $post)
<div class="case-item-wrap">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item"style="height: 300px;">
                                    <div class="case-item__thumb">
                                        <img src="{{$post->featured}}" alt="{{$post->title}}" style="height: 180px;">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single',['slug'=>$post->slug]) }}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                        </div>

<?php
if($i%3==0||$i==$colcount)
{?>
</div>
<div class="row">
    <br>
<?php
}
$i++;
?>

@endforeach
</div>



            <!-- End Post Details -->
            <br>
            <br>
            <br>


        </main>
    </div>
</div>

@endsection