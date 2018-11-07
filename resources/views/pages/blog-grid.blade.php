@extends('layout')

@section('content')

    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>Blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6 ">
                    <div class="post">
                        <div class="post-thumb">
                            <a href="{{route('post.show', $post->slug)}}">
                                <img class="img-responsive" src="{{$post->getImage()}}" alt="">
                            </a>
                        </div>
                        <h3 class="post-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h3>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> {{$post->getDate()}}
                                </li>
                                <li>
                                    <i class="ion-android-people"></i> POSTED BY Admin{{--{{$post->author->name}}--}}
                                </li>
                                <li>
                                    @foreach($post->tags as $tag)
                                        <a href="{{route('tag.show', $tag->slug)}}" class="ion-pricetags">
                                            {{ $tag->title }}
                                        </a>
                                    @endforeach
                                    {{--<a href=""><i class="ion-pricetags"></i> LIFESTYLE</a>,<a href=""> TRAVEL</a>, <a--}}
                                            {{--href="">FASHION</a>--}}
                                </li>

                            </ul>
                        </div>
                        <div class="post-content">
                            <p>{!!$post->description!!} </p>
                            <a href="{{route('post.show', $post->slug)}}" class="btn btn-main">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <ul class="pagination post-pagination">
                    {{$posts->links()}}
                </ul>
            </div>
        </div>
    </div>

@endsection