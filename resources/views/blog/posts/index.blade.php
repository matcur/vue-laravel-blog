@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-body mb-2">
          <div class="search">
            <input type="text">
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
      <div class="col-md-1">
          {{ $postsPaginate->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
