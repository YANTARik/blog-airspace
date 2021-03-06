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

    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post post-single">
                        <h2 class="post-title">{{$post->title}}</h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> {{$post->getDate()}}
                                </li>

                                <li>
                                    <i class="ion-android-people"></i> POSTED BY {{ $post->author->name }}
                                </li>

                                <li>
                                    @foreach($post->tags as $tag)
                                        <a href="{{route('tag.show', $tag->slug)}}" class="ion-pricetags">{{ $tag->title }}</a>
                                    @endforeach
                                    {{--<a href=""><i class="ion-pricetags"></i> LIFESTYLE</a>,<a href=""> TRAVEL</a>, <a--}}
                                            {{--href="">FASHION</a>--}}
                                </li>

                            </ul>
                        </div>
                        <div class="post-thumb">
                            <img class="img-responsive" src="{{$post->getImage()}}" alt="">
                        </div>
                        <div class="post-content post-excerpt">
                            {!! $post->content !!}
                        </div>

                        @if(!$post->comments->isEmpty())
                        <div class="post-comments">
                            <h3 class="post-sub-heading">{{ $post->getComments()->count() }} Comments</h3>
                            <ul class="media-list comments-list m-bot-50 clearlist">
                                <!-- Comment Item start-->
                                @foreach($post->getComments() as $comment)
                                <li class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object comment-avatar" src="{{$comment->author->getAvatar()}}" alt="" width="50" height="50">
                                    </a>

                                    <div class="media-body">
                                        <div class="comment-info">
                                            <h4 class="comment-author">
                                                <a href="#">{{$comment->author->name}}</a>

                                            </h4>
                                            <time>{{$comment->created_at->diffForHumans()}}</time>
                                        </div>

                                        <p>
                                            {{$comment->text}}
                                        </p>

                                    </div>

                                </li>
                                @endforeach
                                <!-- End Comment Item -->
                            </ul>
                        </div>
                        @endif


                        @if(Auth::check())
                        <div class="post-comments-form">
                            <h3 class="post-sub-heading">Leave You Comments</h3>
                            <form method="post" action="/comment" id="form" role="form" >
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="row">
                                    <!-- Comment -->
                                    <div class="form-group col-md-12">
                                        <textarea name="message" id="text" class="form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                    </div>

                                    <!-- Send Button -->
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-main ">
                                            Send comment
                                        </button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        @else
                            <div class="post-comments-form">
                                <h3 class="post-sub-heading">Для того чтобы оставить комментарий необходимо авторизироватся.</h3>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection