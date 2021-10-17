@extends('layouts.app')

@section('title', __('welcome.title', ['page' => 'Home']))
@section('subtitle', __('welcome.subtitle'))

@section('content')
<section class="section">
    <div class="container">
      <h1 class="title">
        {{ __('Hello Fathi') }}
        {{-- <button onclick="startFCM()"
            class="button is-danger">Allow notification
        </button> --}}
      </h1>
      <div>
        <ul>
            @if(Session::get('error'))
                <li>{{ Session::get('error') }}</li>
            @endif
        </ul>
      </div>
      <div class="columns is-multiline">
        @foreach ($posts as $post)
        <div class="column is-4">
            <div class="card">
                <div class="card-image">
                <figure class="image is-4by3">
                    <img src="{{ Storage::disk('public')->exists($post->featured_image) ? Storage::url($post->featured_image) : $post->featured_image }}" alt="Placeholder image">

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
                    <p class="title is-4"><a href="{{ route('posts.show', $post) }}">{{ $post->getLocalized('title') }}</a></p>
                    <p class="subtitle is-6">{{ $post->author }}</p>
                    </div>
                </div>

                <div class="content">
                    {!! $post->content !!}
                    <br>
                    <time datetime="2016-1-1">{{ $post->created_at }}</time>
                    <br>
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}" class="tag is-link">{{ $tag->name }}</a>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
      {{ $posts->links() }}
    </div>
  </section>
@endsection
