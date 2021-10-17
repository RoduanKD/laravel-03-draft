<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(Request $request)
    {
        $posts = Post::paginate(6);

        if ($request->expectsJson()) {
            return $posts;
        }
        return view('welcome', ['posts' => $posts]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about() {
        $name = 'Roduan';
        $lname = '<b>Kareem Aldeen</b>';
        $posts = [1, 2, 3, 4];

        return view('about', [
            'name' => $name,
            'lname' => $lname,
            'posts' => $posts,
        ]);
    }
}
