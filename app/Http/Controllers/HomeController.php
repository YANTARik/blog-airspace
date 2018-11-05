<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class HomeController extends Controller
{

    public function index() {
        $posts = Post::paginate(10);

        return view(pages.index)->with('posts', $posts);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('post'));
    }

    public function tag($slug) {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $post = $tag->posts()->paginate(2);

        return view('pagas.list', ['post' => $posts]);
    }
}
