@extends('layouts.app')

@section('title', 'Edit: ' . $post->title)
@section('subtitle', 'please update the following information')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                {{ $post->title }} information
            </h1>

            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input @error('title')is-danger @enderror" name="title" type="text" placeholder="Text input" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Author Name</label>
                    <div class="control">
                        <input class="input @error('author_name')is-danger @enderror" name="author_name" type="text" placeholder="Text input" value="{{ old('author_name', $post->author_name) }}">
                        @error('author_name')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Author Image</label>
                    <div class="control">
                        <input class="input" name="author_image" type="text" placeholder="Text input" value="{{ $post->author_image }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Featured Image</label>
                    <div class="control">
                        <input class="input" name="featured_image" type="text" placeholder="Text input" value="{{ $post->featured_image }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea class="textarea" name="content" placeholder="Textarea">{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
