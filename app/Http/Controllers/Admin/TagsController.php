<?php

namespace App\Http\Controllers\Admin;


use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', ['tags'=>$tags]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function fetchTags()
    {
        $tags = Tag::orderBy('created_at', 'desc')
            ->get();

        return response()
            ->json([
                'tags' => $tags
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        Tag::create($request->all());
        return redirect()->route('tags.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required' //обязательно
        ]);

        $tag = Tag::find($id);

        $tag->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tags.index');
    }

}
