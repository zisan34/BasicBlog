@extends('layouts.frontEnd')

@section('content')
<!-- ... End Header -->


<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Result for: {{$title}}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            


<?php
$colcount=count($posts);
$i=1;
?>

@if($colcount>0)
<div class="row">
@foreach($posts as $post)
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item" style="height: 300px;">
                                    <div class="case-item__thumb">
                                        <img src="{{$post->featured}}" alt="{{$post->title}}" style="height: 180px;">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single',['slug'=>$post->slug]) }}">{{$post->title}}</a></h6>
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
@else
<div class="row text-center">
    <h1>No results found.</h1>
</div>
@endif

            <!-- End Post Details -->
            <br>
            <br>
            <br>


        </main>
    </div>
</div>

@endsection