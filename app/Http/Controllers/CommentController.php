<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'comment' => 'required|string|max:999',
        ]);

        $post = Post::findOrFail($id);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = auth()->check() ? auth()->id() : null;
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect(route('posts.show', $id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::check() && (Auth::id() === $comment->user_id || Auth::id() === $comment->post->user_id)) {
            $comment->delete();     
        }
        return redirect(route('posts.show', $comment->post_id));  
    }
}
