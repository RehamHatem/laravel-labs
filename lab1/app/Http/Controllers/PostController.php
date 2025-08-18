<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DB facade
        // $posts = DB::table('posts')->get();

        //Eloquant
$posts = Post::with('user')->simplePaginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creators = User::all(); 
        return view('posts.create', compact('creators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // DB::table('posts')->insert(
        //     [
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'created_at' => '2025-08-01',
        //     'posted_by' => $request->post_creator
        //     ]
        //     );

        //Eloquant
        // $post = new Post();
        // $post->title = $request->title;
        //  $post->description = $request->description;
        //  $post->posted_by = $request->post_creator;
        //  $post->save();

        //mass assignment
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //DB facade
        // $post = Db::table('posts')->where('id', $id)->firstOrFail();

        //Eloquant
        $post = Post::findOrFail($id);
        // if(!$post) {
        //     return "Post not found";
        // }
            return view('posts.show', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $post = Post::findOrFail($id);
     $creators = User::all();
      return view('posts.edit', compact('post', 'creators'));
   
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //DB facade
        //  $posts = DB::table('posts')->where('id', $id)->update(
        //     [
        //         'title' => $request->title,
        //         'description' => $request->description,
        //         'posted_by' => $request->post_creator
        //     ]
        //  );

         //eloquant
         $post = Post::findOrFail($id);
         $post->title = $request->title;
         $post->description = $request->description;
         $post->user_id = $request->post_creator;
         $post->save();
                     
        return redirect()->route('posts.index')->with('success', 'Post Updated!');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table('posts')->where('id', $id)->delete();

        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted');
    }
}