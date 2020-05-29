@extends('layouts.master')

@section('body')


  <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/'.$post->image) }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $post->title }}</h1>

              <span class="meta">Posted by
                <a href="#">Admin</a>
                {{ $post->created_at->diffForHumans() }}</span>

            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-left col-md-10 mx-auto">


            {!! $post->description !!}

          </div>
        </div>
      </div>
    </article>

    <hr>

    @php
      $pageTitle = $post->title;
      $url = route('post',[$post->id, $post->title]);
    @endphp
    <div class="container">

      <h2>Share</h2>
      <div>
        <a class="btn btn-sm btn-social btn-fb" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" target="_blank" title="Share this post on Facebook">
            <i class="fab fa-facebook-square"></i> Share
        </a>
          <a class="btn btn-sm btn-social btn-tw" href="https://twitter.com/intent/tweet?text={{ $pageTitle }}&amp;url={{ $url }}" target="_blank" title="Share this post on Twitter">
            <i class="fab fa-twitter"></i> Tweet
        </a>
        <a class="btn btn-sm btn-social btn-in" href="https://www.linkedin.com/shareArticle?mini=true&url={{$url}}&amp;title={{$pageTitle}}" target="_blank" title="Share this post on LinkedIn">
          <i class="fab fa-linkedin-in" data-fa-transform="grow-2"></i>
        </a>

        <a class="btn btn-sm btn-social btn-rd" href="https://www.reddit.com/submit?url={{$url}}&title={{$pageTitle}}" target="_blank" title="Share this post on Reddit">
          <i class="fab fa-reddit-alien" data-fa-transform="grow-4"></i>
        </a>

      </div>

    </div>

    <hr>





<style media="screen">
@media only screen and (min-width: 768px){
  header.masthead .page-heading, header.masthead .post-heading, header.masthead .site-heading {
      padding: 106px 0;
  }
}


.container {
padding: 50px;
text-align: center;
}



/* Solid Social Share Buttons */

.btn-social,
.btn-social:visited,
.btn-social:focus,
.btn-social:hover,
.btn-social:active {
color: #ffffff;
text-decoration: none;
transition: opacity .15s ease-in-out;
}

.btn-social:hover,
.btn-social:active {
opacity: .75;
}

.btn-fb {
background-color: #3b5998;
}

.btn-tw {
background-color: #1da1f2;
}

.btn-in {
background-color: #0077b5;
}

.btn-gp {
background-color: #db4437;
}

.btn-rd {
background-color: #ff4500;
}

.btn-hn {
background-color: #ff4000;
}

/* Outline Social Share Buttons */

.btn-social-outline {
background-color: transparent;
background-image: none;
text-decoration: none;
transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
}

.btn-fb-outline {
color: #3b5998;
border-color: #3b5998;
}

.btn-fb-outline:hover,
.btn-fb-outline:active {
color: #ffffff;
background-color: #3b5998;
}

.btn-tw-outline {
color: #1da1f2;
border-color: #1da1f2;
}

.btn-tw-outline:hover,
.btn-tw-outline:active {
color: #ffffff;
background-color: #1da1f2;
}

.btn-in-outline {
color: #0077b5;
border-color: #0077b5;
}

.btn-in-outline:hover,
.btn-in-outline:active {
color: #ffffff;
background-color: #0077b5;
}

.btn-gp-outline {
color: #db4437;
border-color: #db4437;
}

.btn-gp-outline:hover,
.btn-gp-outline:active {
color: #ffffff;
background-color: #db4437;
}

.btn-rd-outline {
color: #ff4500;
border-color: #ff4500;
}

.btn-rd-outline:hover,
.btn-rd-outline:active {
color: #ffffff;
background-color: #ff4500;
}

.btn-hn-outline {
color: #ff4000;
border-color: #ff4000;
}

.btn-hn-outline:hover,
.btn-hn-outline:active {
color: #ffffff;
background-color: #ff4000;
}

/* Fluid Styles */

.fluid {
display: flex;
}

.fluid a {
flex-grow: 1;
margin-right: 0.25rem;
}

.fluid a:last-child {
margin-right: 0rem;
}
</style>
@endsection
