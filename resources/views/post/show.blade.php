@extends('layouts.app')

@section('title', $post->title)
@section('subtitle', $post->category->name)

@section('content')
<div class="container">
    <div class="image"><img src="{{ $post->featured_image }}" alt="{{ $post->title }}"></div>
    <div class="content">
        {!! Purify::clean($post->content) !!}
    </div>
    <form action="{{ route('posts.destory', $post) }}" method="POST">
        @csrf
        @method('delete')
        <button class="button is-danger" type="submit">Delete this Post</button>
    </form>
</div>
@endsection
