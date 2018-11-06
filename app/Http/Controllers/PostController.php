<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class PostController extends Controller
{

    public function index() {

        $posts = Post::all();
        return view('pages.posts.index', ['posts' => $posts]);
    }

    public function create() {
        $tags = Tag::pluck('title', 'id')->all();

        return view('pages.posts.create', compact(
            'tags'
        ));
    }

}
