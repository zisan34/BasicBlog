<style>
    img{
        max-height: 210px;
    }
</style>

@extends('layouts.frontEnd')

@section('content')
<div class="header-spacer"></div>
<div class="row">
    <div class="col-lg-2"></div>
<div class="col-lg-8">
<article class="hentry post post-standard has-post-thumbnail sticky">

<div class="post-thumb">
    <img src="{{$first_post->featured}}" alt="{{$first_post->title}}">
    <div class="overlay"></div>
    <a href="{{$first_post->featured}}" class="link-image js-zoom-image">
        <i class="seoicon-zoom"></i>
    </a>
    <a href="{{ route('post.single',['id'=>encrypt($first_post->id)]) }}" class="link-post">
        <i class="seoicon-link-bold"></i>
    </a>
</div>

<div class="post__content">

    <div class="post__content-info">

            <h2 class="post__title entry-title text-center">
                <a href="{{ route('post.single',['id'=>encrypt($first_post->id)]) }}">{{$first_post->title}}</a>
            </h2>

            <div class="post-additional-info">

                <span class="post__date">

                    <i class="seoicon-clock"></i>

                    <time class="published" datetime="2016-04-17 12:00:00">
                       {{$first_post->created_at->diffForHumans()}}
                    </time>

                </span>

                <span class="category">
                    <i class="seoicon-tags"></i>
                    <a href="{{ route('category.posts',['id'=>$first_post->category->id]) }}">{{$first_post->category->name}}</a>
                </span>

                <span class="post__comments">
                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                    <a href="{{ route('post.single',['id'=>$first_post->id])}}#disqus_thread"></a>
                </span>

            </div>
    </div>
</div>

</article>
</div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="col-lg-6">
        <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{$second_post->featured}}" alt="{{$second_post->title}}">
                    <div class="overlay"></div>
                    <a href="{{$second_post->featured}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="{{ route('post.single',['id'=>encrypt($second_post->id)]) }}" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info">

                            <h2 class="post__title entry-title text-center  ">
                                <a href="{{ route('post.single',['id'=>encrypt($second_post->id)]) }}">{{$second_post->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-04-17 12:00:00">
                                        {{$second_post->created_at->toFormattedDateString()}}
                                    </time>

                                </span>

                                <span class="category">
                                    <i class="seoicon-tags"></i>
                                    <a href="{{ route('category.posts',['id'=>$second_post->category->id]) }}">{{$second_post->category->name}}</a>
                                </span>

                                <span class="post__comments">
                                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                    <a href="{{ route('post.single',['id'=>$second_post->id])}}#disqus_thread"></a>
                                </span>

                            </div>
                    </div>
                </div>

        </article>
    </div>
    <div class="col-lg-6">
        <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="{{$third_post->featured}}" alt="{{$third_post->title}}">
                    <div class="overlay"></div>
                    <a href="{{$third_post->featured}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="{{ route('post.single',['id'=>encrypt($third_post->id)]) }}" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>

                <div class="post__content">

                    <div class="post__content-info">

                            <h2 class="post__title entry-title text-center ">
                                <a href="{{ route('post.single',['id'=>encrypt($third_post->id)]) }}">{{$third_post->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-04-17 12:00:00">
                                        {{$third_post->created_at->toFormattedDateString()}}
                                    </time>

                                </span>

                                <span class="category">
                                    <i class="seoicon-tags"></i>
                                    <a href="{{ route('category.posts',['id'=>$third_post->category->id]) }}">{{$third_post->category->name}}</a>
                                </span>

                                <span class="post__comments">
                                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                    <a href="{{ route('post.single',['id'=>$third_post->id]) }}#disqus_thread"></a>
                                </span>

                            </div>
                    </div>
                </div>

        </article>
    </div>
</div>
</div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
        @foreach($sorted_categories as $category)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title"><a href="{{ route('category.posts',['id'=>$category->id]) }}">{{$category->name}}</a></h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">

                @foreach($category->posts()->orderBy('created_at','des')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$post->featured}}" alt="{{$post->title}}">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single',['id'=>encrypt($post->id)]) }}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                @endforeach
                            
                        </div>
                    </div>
                </div>
        @endforeach
            </div>
            </div>
        </div>
    </div>

@endsection