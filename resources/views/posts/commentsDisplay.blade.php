<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/CommentShow.css')}}">

@foreach($comments as $comment)

<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
<div class="container">
<div class="row">
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
                   
        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
            <div class="g-mb-15">
              <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
 
                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name }}</h5>
                
              </div>
        
              <p>{{ $comment->body }}</p>
        
              <ul class="list-inline d-sm-flex my-0">
                <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                    178
                  </a>
                </li>
                <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                    34
                  </a>
                </li>

                <li class="list-inline-item ml-auto">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Reply
                  </a>
                </li>
              </ul>
            </div>
        </div>
    </div>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div >
                <input type=text name=body class="form-control" />
                <input type=hidden name=post_id value="{{ $post_id }}" />
                <input type=hidden name=parent_id value="{{ $comment->id }}" />
                <input type=submit class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
</div>
</div>  
    @endforeach
    
