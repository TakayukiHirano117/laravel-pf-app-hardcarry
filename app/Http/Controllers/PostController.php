<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('app.index', compact('posts'));
    }

    public function create() {
        return view('app.post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::create($validated);
        return redirect()->route('app.index');
    }
}
