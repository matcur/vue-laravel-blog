@php
  /**
   * @var App\Models\Comment $comment
   * @var App\Models\Post $post
   */
  $deep = isset($deep)? $deep: 0;
@endphp
<div class="@if($deep == 0) comments @endif">
  @foreach($comments as $comment)
    <div class="comment @if($deep == 0) root-comment @endif">
      <div class="head">
        <span class="created-at">{{ $comment->created_at->diffForHumans() }}</span>
      </div>
      <div class="content">
        {{ $comment->content }}
      </div>
      <div class="bottom">
        <div class="replies">
          @include('blog.includes.comments', ['comments' => $comment->replies, 'deep' => $deep + 1])
        </div>
      </div>
    </div>
  @endforeach
</div>
