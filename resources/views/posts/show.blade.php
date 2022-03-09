@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/show.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@push('fontawesome')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="timeline-body">
                              <div class="timeline-header">
                              <span class="pull-right text-muted">{{date('d/m/y h:i', strtotime($post->created_at))}}</span>
                                 <h2>{{ $post->title }}</h2>
                              </div>
                              <div class="timeline-content">
                                 <p>
                                 {{ $post->body }}
                                 </p>
                              </div>
                              <div class="timeline-likes">
                                 <div class="stats-right">
                                    <span class="stats-text">259 Shares</span>
                                    <span class="stats-text">21 Comments</span>
                                 </div>
                                 <div class="stats">
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                    </span>
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="stats-total">4.3k</span>
                                 </div>
                              </div>
                              <div class="timeline-footer">
                              

                              <like-component :post="{{ $post->id }}"></like-component>
                              <dis-like-component :post="{{ $post->id }}"></dis-like-component>

                              
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a> 
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                              </div>
                              @guest
                                <h7>Đăng nhập để comment</h7>
                              @else
                              @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                              <div class="timeline-comment-box">
                                 <div class="input">
                                 <form method="post" action="{{ route('comments.store'   ) }}">
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
                           @endsection                           