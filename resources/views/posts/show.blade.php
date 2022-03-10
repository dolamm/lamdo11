@extends('layouts.app')

@section('content')
<html>
    <head>
        <link rel="stylesheet" href="{{asset('css/show.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>
    <body>
        <div class="timeline-body" id="like-dislike-app">
                              <div class="timeline-header">
                              <span class="pull-right text-muted">{{date('d/m/y h:i', strtotime($post->created_at))}}</span>
                                 <h2>{{ $post->title }}</h2>
                                 <form method="POST" action="{{route('bookmark')}}">
                                 @csrf
                                 <input type="hidden" name=post_id value="{{$post->id}}">
                                 <button type="submit" class="btn btn-link text-primary">
                                 <i @if($post->isbookmark()==true) class= "far fa-bookmark" @else class= "fas fa-bookmark" @endif></i>
                                 </button>
                                 </form>
                              </div>
                              <div class="timeline-content">
                                 <p>
                                 {{ $post->body }}
                                 </p>
                              </div>
                              
                              <div class="timeline-footer" id="like-dislike-app">

                              <like-component :post="{{ $post->id }}"></like-component>
                              <dislike-component :post="{{ $post->id }}"></dislike-component>
                              
                              </div>
                              @guest
                                <h7>Đăng nhập để comment</h7>
                              @else
                              @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                              <div class="timeline-comment-box">
                                 <div class="input">
                                 <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name=body></textarea>
                            <input type=hidden name=post_id value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type=submit class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                                 </div>
                              </div>
                           </div>
   @endguest
    </body>
</html>

@endsection                           
