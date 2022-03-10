@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Bookmarked Posts</h1>
            <table class="table table-bordered">
                <thead>
                    <th width=80px>Id</th>
                    
                    <th width=150px>Action</th>
                </thead>
                <tbody>
                @if(isset($bookmarks))
                @foreach($bookmarks as $key=>$bookmark)
                <tr>
                    <td>{{ $bookmark->post_id }}</td>
                    
                    <td>
                        <a href="{{ route('posts.show', $bookmark->post_id) }}" class="btn btn-primary">View Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
   
            </table>
        </div>
    </div>
</div>
@endif
@endsection