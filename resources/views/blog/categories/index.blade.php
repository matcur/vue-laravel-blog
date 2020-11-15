@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-body">
          <div class="category-info">
            <div class="title">{{ $category->title }}</div>
            <div class="description">{{ $category->description }}</div>
          </div>
      </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-body">
          @include('blog.includes.posts-paginate')
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      {{ $postsPaginate->links() }}
    </div>
  </div>
@endsection
