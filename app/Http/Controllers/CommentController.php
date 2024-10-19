<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $comment = new Comment($request->validated());
        $comment->post_id = $post->id;
        $comment->user_id = auth()->check() ? auth()->id() : null;
        $comment->save();
        return redirect(route('posts.show', $id));
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
