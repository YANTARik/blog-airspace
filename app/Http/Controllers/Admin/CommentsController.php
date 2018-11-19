<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index() {
        $comments = Comment::all();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function create()
    {
        $users = User::pluck('name', 'id')->all();
        $posts = Post::pluck('title', 'id')->all();

        return view('admin.comments.create', compact(
            'users',
            'posts'
        ));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'text' =>  ['required', 'string', 'max:255']
        ]);

        Comment::add($request->all());
        return redirect()->route('comments.index');
    }

    public function destroy($id) {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
