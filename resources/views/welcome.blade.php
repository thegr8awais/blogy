@extends('layouts.master')

@section('body')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{ asset('blog-asset/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>A simple blogy</h1>
            <span class="subheading">a blogy with lots of article and blogies</span>
          </div>
        </div>
      </div>
    </div>
  </header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            @foreach ($posts as $post)
              <div class="post-preview">
                  <a href="{{ route('post',[$post->id, urlSlug($post->title)]) }}">
                      <h2 class="post-title">
                          {{ $post->title }}
                      </h2>
                      <h3 class="post-subtitle">
                          {{ Str::words($post->descriptionText, 10, "...") }}
                      </h3>
                  </a>
                  <p class="post-meta">Posted by
                      <a href="#">Admin</a>
                       {{ $post->created_at->diffForHumans() }}</p>
              </div>

              <hr>
            @endforeach


            <hr>


        </div>


        <div class="col-lg-8 col-md-10 mx-auto">
          @if ($posts->total() > $posts->perPage())
          <div class="card-footer tx-12 pd-y-15 bg-transparent">
              <div class="d-flex form-layout-footer justify-content-center submitSection">
                {!! $posts->links() !!}
              </div>
          </div>
          @endif
        </div>


    </div>
</div>


@endsection
