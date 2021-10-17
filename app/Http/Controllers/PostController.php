<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        if (Gate::denies('create-post')) {
            abort(403);
        }
        // dd($request->featured_image);
        // dd($request->tags);
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content' => 'required|string|min:20',
            'category_id' => 'required|numeric|exists:categories,id',
            'tags' => 'required|exists:tags,id',
            'author_name' => 'required|string|min:3|max:255',
            'author_image' => 'required|active_url',
            'featured_image' => 'required',
        ]);
        // dd($request->all());
        $post = new Post();
        $post->title_en = $request->title_en;
        $post->title_ar = $request->title_ar;
        $post->slug = Str::lower(str_replace(' ', '-', $request->title_en));
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->author_name = $request->author_name;
        $post->author_image = $request->author_image;
        $post->featured_image = $request->file('featured_image')->store('public/post_images');
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect('/');
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request) {
        $request->validate([
            'title' => 'string|max:255',
            'content' => 'string|min:20',
            'author_name' => 'string|min:3|max:255',
            'author_image' => 'active_url',
            'featured_image' => 'active_url',
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_name = $request->author_name;
        $post->author_image = $request->author_image;
        $post->featured_image = $request->featured_image;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
