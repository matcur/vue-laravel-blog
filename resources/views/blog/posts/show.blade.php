@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="card card-body">
        <div class="show-post">
          <span class="title">
            {{ $post->tilte }}
          </span>
          @if($post->thumbnail_path)
            <div class="thumbnail">
              <img src="{{ $post->thumbnail_path }}" alt="" class="thumbnail-img">
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
    <div class="row justify-content-center">
      <div class="card card-body">
        @include('blog.includes.comments', ['rootComments' => $post->rootComments, 'deep' => 0])
      </div>
    </div>
  </div>
@endsection
