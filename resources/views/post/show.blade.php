@extends('layouts.blog.blog')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="/post/{{$post->id}}">{{$post->title}}</a>
                </h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">Mark</a></p>
                <p>{{$post->body}}</p>
              </div><!-- /.blog-post -->
              
              <ul class="list-group">
                @foreach($post->comments as $comment)
                  <li class="list-group-item">{{$comment->created_at->diffForHumans()}}: {{$comment->body}}</li>
                @endforeach
              </ul>
              
              <br><br><br><br><br>
              @include('shared.errors')
                  <form method="POST" action="/post/{{$post->id}}/comment">
                  {{csrf_field()}}
          
                    <div class="form-group">
                      <label for="body">Post a comment</label>
                      <textarea name="body" id="body" rows="5" class="form-control">
                          
                      </textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
</div>
@endsection