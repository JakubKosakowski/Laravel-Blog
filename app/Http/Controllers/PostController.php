<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('posts.create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {
        $post = new Post($request->validate());
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', [
            'post' => Post::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', [
            'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->fill($request->validate());
        $post->save();
        return redirect(route('posts.show', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        try{
            $post->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error'
            ])->setStatusCode(500);
        }
    }
}
