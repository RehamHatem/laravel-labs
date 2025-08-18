<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
    public function store(Request $request ,Post $post)
    {
        //
        $post->comments()->create([
            'content' => $request->content,
            'user_id' =>  $request->user_id, 
           
        ]);
    return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,string $postId)
    {
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($id);
        return view('comments.show', compact('post', 'comment'));
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
        //
    }
}
