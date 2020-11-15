<div class="posts">
  @foreach($postsPaginate as $post)
    <div class="post">
      <div class="head">
        <span class="title">
          <a href="{{ route('blog.posts.show', $post) }}">
            {{ $post->title }}
          </a>
        </span>
        <span class="published-at">
          {{ $post->published_at->diffForHumans() }}
        </span>
      </div>
      @if($post->thumbnail_path)
        <div class="thumbnail">
          <img src="{{ asset($post->thumbnail_path) }}" alt="Thumbnail" class="thumbnail-img">
        </div>
      @endif
      <div class="description">
        {{ $post->description }}
      </div>
    </div>
  @endforeach
</div>
