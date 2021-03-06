<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class HomeController extends Controller
{
    public function index()
    {
        $comments = Comment::all()->take(4);
        return view('pages.index', ['comments' => $comments]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(2);
        return view('pages.listtags', ['posts' => $posts]);
    }

    public function service()
    {
        return view('pages.service');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function comingSoon() {
        return view('pages.coming-soon');
    }

    public function notfound()
    {
        return view('pages.404');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function portfolioSingle()
    {
        return view('pages.portfolio-single');
    }

    public function blogGrid()
    {
        $posts = Post::paginate(6);
        return view('pages.blog-grid')->with('posts', $posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.blog-single', compact('post'));
    }





}