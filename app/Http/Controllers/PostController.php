<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        // $posts = Post::all()->sortByDesc('created_at');
        return view('app.index', compact('posts'));
    }

    public function create() {
        return view('app.post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'deadline' => 'required',
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);
        return redirect()->route('app.index');
    }

    public function show(Post $post) {
        return view('app.post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('app.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $validated['user_id'] = auth()->id();

        $post->update($validated);
        $request->session()->flash('message', '更新しました');
        return back();
    }

    public function confirmDelete(Post $post) {
        return view('app.post.confirmDelete', compact('post'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('app.index');
    }
}
