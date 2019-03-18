@extends('main')

@section('content')

<div class="container">
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{!! $post->post_title !!}</h1>
            <span class="meta">Posted on {!! $post->created_at !!}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">            
      		<img src="{!! url($post->post_image) !!}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>{!! $post->post_body !!}</p>
        </div>
      </div>
    </div>
  </article>

  <hr>
</div>
@endsection
