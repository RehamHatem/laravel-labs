<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth:sanctum'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

         $posts = Post::with('user')->get();
        return response()->json([
            "message" => "Posts retrieved successfully",
            "data" => PostResource::collection($posts)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);

        return response()->json([
            "message" => "Post created successfully",
            "data" => new PostResource($post)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return response()->json([
            'message' => 'Post retrieved successfully',
            'data' => new PostResource($post->load('user'))
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
          $post = Post::find($id);

        if ($post->user_id !== Auth::id()) {
            return response()->json([
                "message" => "You are not authorized to update this post"
            ], 403);
        }

        $post->update($request->only(['title', 'description', 'image']));

        return response()->json([
            "message" => "Post updated successfully",
            "data" => new PostResource($post)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          $post = Post::find($id);

        if ($post->user_id !== Auth::id()) {
            return response()->json([
                "message" => "You are not authorized to delete this post"
            ], 403);
        }

        $post->delete();

        return response()->json([
            "message" => "Post deleted successfully"
        ], 200);
    }
    }
    
