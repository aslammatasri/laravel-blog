<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return view('home', compact('posts'));
    }

    public function create()
    {

        return view('create');
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('edit', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|',
        ]);

        $posts = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|',
        ]);

        //find by id
        $posts = Post::findOrFail($id);

        //update
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->status = $request->input('status');

        //save
        $posts->save();

        return redirect()->route('home')->with('success', 'Post updated successfully');

    }

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully');

    }
}
