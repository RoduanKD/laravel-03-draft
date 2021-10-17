@extends('layouts.app')

@section('title', 'Add new Post')
@section('subtitle', 'please enter the following information')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                New post information
            </h1>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label class="label">English Title</label>
                    <div class="control">
                        <input class="input" name="title_en" value="{{ old('title_en') }}" type="text"
                            placeholder="Text input">
                        @error('title_en')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Arabic Title</label>
                    <div class="control">
                        <input class="input" name="title_ar" value="{{ old('title_ar') }}" type="text"
                            placeholder="Text input">
                        @error('title_ar')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Category</label>
                    <div class="control">
                        <div class="select @error('category_id')is-danger @enderror">
                            <select name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Tags</label>
                    <div class="control">
                        <div class="select is-multiple @error('tags')is-danger @enderror">
                            <select name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tags')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Author Name</label>
                    <div class="control">
                        <input class="input @error('author_name')is-danger @enderror" name="author_name"
                            value="{{ old('author_name') }}" type="text" placeholder="Text input">
                        @error('author_name')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Author Image</label>
                    <div class="control">
                        <input class="input" name="author_image" value="{{ old('author_image') }}" type="text"
                            placeholder="Text input">
                        @error('author_image')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label class="label">Featured Image</label>
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="featured_image">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                        </label>
                        @error('featured_image')
                            <div class="help is-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="control">
                        <input class="input" name="featured_image" value="{{ old('featured_image') }}" type="text" placeholder="Text input">
                    </div> --}}
                </div>
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea class="textarea" id="editor" name="content"
                            placeholder="Textarea">{{ old('content') }}</textarea>
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

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
