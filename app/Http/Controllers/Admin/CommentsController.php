<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
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
        return view('admin.comments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' =>  'required' //обязательно
        ]);

        Comment::create($request->all());
        return redirect()->route('comments.index');
    }

    public function destroy($id) {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
