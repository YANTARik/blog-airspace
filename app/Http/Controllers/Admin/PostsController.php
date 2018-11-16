<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.create', compact(
            'tags'
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);

        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));

        return redirect()->route('posts.index');

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();

        return view('admin.posts.edit', compact(
            'tags',
            'post',
            'selectedTags'
        ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'content'   =>  'required',
            'date'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $post = Post::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::find($id)->remove();
        return redirect()->route('posts.index');
    }



}
