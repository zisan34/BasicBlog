@extends('layouts.frontEnd')
@section('title')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$title}}</h1>
    </div>
</div>
@endsection
@section('content')

<div class="row medium-padding120">
    <main class="main">
        <div class="col-lg-10 col-lg-offset-1">
            <article class="hentry post post-standard-details">

                <div class="post-thumb">
                    <img src="{{$post->featured}}" alt="seo">
                </div>

                <div class="post__content">


                    <div class="post-additional-info">

                        <div class="post__author author vcard">
                            Posted by

                            <div class="post__author-name fn">
                                <a href="#" class="post__author-link">{{$post->user->name}}</a>
                            </div>

                        </div>

                        <span class="post__date">

                            <i class="seoicon-clock"></i>

                            <time class="published">
                                {{$post->created_at->toFormattedDateString()}}
                            </time>

                        </span>

                        <span class="category">
                            <i class="seoicon-tags"></i>
                            <a href="#">{{$post->category->name}}</a>
                        </span>
                        <a href="{{ route('post.single',['slug'=>$post->slug]) }}#disqus_thread"></a>

                    </div>

                    <div class="post__content-info">
                    	{!!$post->content!!}


                        <div class="widget w-tags">
                            <div class="tags-wrap">
                            	@foreach($post->tags as $tag)
                                <a href="#" class="w-tags-item">{{$tag->tag}}</a>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

                <div class="socials">Share:
                    
                
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
            
                </div>

            </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{$post->user->profile->avatar}}" style="max-height: 70px;" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$post->user->name}}</h5>
                            {{-- <p class="author-info">SEO Specialist</p> --}}
                        </div>
                        <p class="text">{{$post->user->profile->about}}
                        </p>
                        <div class="socials">

                            <a href="{{$post->user->profile->facebook}}" class="social__item" target="blank">
                                <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{asset('app/svg/google.svg')}}" alt="google">
                            </a>

                            <a href="{{$post->user->profile->youtube}}" class="social__item" target="blank">
                                <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    @if($prev_post)


                    <a href="{{ route('post.single',['slug'=>$prev_post->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{$prev_post->title}}</p>
                        </div>
                    </a>

                    @endif

                	@if($next_post)

                    <a href="{{ route('post.single',['slug'=>$next_post->slug]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{$next_post->title}}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>

                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                    @include('inc.disqus')
                </div>

                <div class="row">

                </div>


            </div>



        <!-- End Post Details -->



    </main>
<div class="addthis_relatedposts_inline"></div>

</div>



@endsection