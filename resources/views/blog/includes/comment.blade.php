@php
/**
 * @var App\Models\Comment $comment
 */
@endphp
<div class="comment"@if($deep == 0) style="margin-right: 20px"@endif>
  <div class="head">
    {{ dd($comment->commentator) }}
    <span class="user-name">{{ $comment->commentator->name }}</span>
    <span class="created-at">{{ $comment->created_at->diffForHumans() }}</span>
  </div>
  <div class="content">
    {{ $comment->content }}
  </div>
  <div class="bottom">
    <div class="replies">
      @include('blog.includes.comments', ['rootComments' => $comment->replies, 'deep' => $deep++])
    </div>
  </div>
</div>
