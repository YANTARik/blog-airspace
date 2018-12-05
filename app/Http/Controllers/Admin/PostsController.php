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

        return view('admin.posts.fetchPosts', ['posts' => $posts]);
    }

    public function fetchPosts()
    {
        $posts = Post::orderBy('created_at', 'asc')
//            ->get();
            ->get(['id', 'title', 'image', 'date',]);



        return response()
            ->json([
                'posts' => $posts,

            ]);
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);

        //dd($request->get('date'));
        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));

        return response()
            ->json(['message' => 'Post is already saved!']);

    }

    public function edit($id)
    {
        //dd($id);
        $post = Post::find($id);
        $tags = Tag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();

//        return view('admin.posts.edit', compact(
//            'tags',
//            'post',
//            'selectedTags'
//        ));
        return response()
            ->json(['message' => 'Post is already updated!']);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
        ]);

        $post = Post::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('image'));
        $post->setTags($request->get('tags'));

        //return redirect()->route('posts.index');
        return response()
            ->json(['message' => 'Post is already updated!']);
    }

    public function destroy($id)
    {

        Post::find($id)->remove();

        return response()
            ->json(['message' => 'Post is already remove']);
    }



}
