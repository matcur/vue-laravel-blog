<div class="comments">
  @foreach($rootComments as $comment)
    @include('blog.includes.comment', ['deep' => $deep++])
  @endforeach
</div>
