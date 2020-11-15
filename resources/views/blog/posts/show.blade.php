@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-md-11">
    <div class="row justify-content-center">
        <div class="show-post">
          <h2 class="title">
            {{ $post->title }}
          </h2>
          @if($post->thumbnail_path)
            <div class="thumbnail">
              <img src="{{ asset($post->thumbnail_path) }}" alt="" class="thumbnail-img">
            </div>
          @endif
          <div class="content">
            {!! $post->content !!}
          </div>
          <div class="post-categories">
            @foreach($post->categories as $category)
              <span class="post-category">
                <a href="{{ route('blog.categories.posts', $category) }}">
                  {{ $category->title }}
                </a>
              </span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        @include('blog.includes.comments', ['comments' => $post->rootComments])
      </div>
    </div>
  </div>
@endsection
