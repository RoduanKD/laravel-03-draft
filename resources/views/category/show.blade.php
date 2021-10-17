@extends('layouts.app')

@section('title', $category->name)
@section('subtitle', 'here you will see all category posts')

@section('content')
<section class="section">
    <div class="container">
      <h1 class="title">
        {{ $category->name }}'s Posts
      </h1>
      <div class="columns is-multiline">
        @foreach ($category->posts as $post)
        <div class="column is-4">
            <div class="card">
                <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ $post->featured_image }}" alt="Placeholder image">
                </figure>
                </div>
                <div class="card-content">
                <div class="media">
                    <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="{{ $post->author_image }}" alt="Placeholder image">
                    </figure>
                    </div>
                    <div class="media-content">
                    <p class="title is-4"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></p>
                    <p class="subtitle is-6">{{ $post->author }}</p>
                    </div>
                </div>

                <div class="content">
                    {{ $post->content }}
                    <br>
                    <time datetime="2016-1-1">{{ $post->created_at }}</time>
                </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
