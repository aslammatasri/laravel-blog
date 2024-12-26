<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $this->authorize('viewAny', $post);

        if (auth()->user()->hasRole('admin')) {

            $posts = Post::paginate(5);

        } else {

            $posts = Post::where('user_id', auth()->id())->paginate(5);

        }
        
        return view('post.index', compact('posts'));
    }

    public function create(Post $post)
    {
        $this->authorize('create', $post);

        return view('post.create');
    }

    public function edit($id)
    {

        $posts = Post::findOrFail($id);
        $this->authorize('update', $posts);

        return view('post.edit', compact('posts'));
    }

    public function store(Request $request, Post $post)
    {
        $this->authorize('create', $post);

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

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);

        $this->authorize('update', $posts);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|',
        ]);

        //update
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->status = $request->input('status');

        //save
        $posts->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
