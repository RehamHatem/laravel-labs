<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [];

    public function __construct()
    {
       $this->posts = [
    [
        'id'          => 1,
        'title'       => 'Getting Started with Laravel 12',
        'description' => 'An introductory guide to installing Laravel 12, setting up your environment, and creating your first project.',
        'posted_by'   => 'Ahmed',
        'created_at'  => '2025-08-01',
        'actions'     => 'view, edit, delete'
    ],
    [
        'id'          => 2,
        'title'       => 'Understanding MVC Architecture',
        'description' => 'A deep dive into the Model-View-Controller pattern, its benefits, and how Laravel implements it.',
        'posted_by'   => 'Ali',
        'created_at'  => '2025-08-03',
        'actions'     => 'view, edit, delete'
    ],
    [
        'id'          => 3,
        'title'       => 'Building Your First Blade Template',
        'description' => 'Learn how to create dynamic and reusable Blade templates for your Laravel application.',
        'posted_by'   => 'Ahmed',
        'created_at'  => '2025-08-05',
        'actions'     => 'view, edit, delete'
    ],
    [
        'id'          => 4,
        'title'       => 'Introduction to Eloquent ORM',
        'description' => 'An overview of Laravel’s Eloquent ORM and how to use it to interact with your database efficiently.',
        'posted_by'   => 'Omar',
        'created_at'  => '2025-08-07',
        'actions'     => 'view, edit, delete'
    ],
    [
        'id'          => 5,
        'title'       => 'Handling Forms and Validation',
        'description' => 'A complete guide to handling form submissions in Laravel and validating user input.',
        'posted_by'   => 'Ali',
        'created_at'  => '2025-08-10',
        'actions'     => 'view, edit, delete'
    ],
];

    }

    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    public function create()
    {
        return view('posts.create', ['title' => 'Create Post']);
    }

    public function store(Request $request)
    {
        $newPost = [
            'id'         => count($this->posts) + 1,
            'title'      => $request->input('title'),
            'posted_by'  => $request->input('creator'),
            'created_at' => now()->toDateString(),
            'actions'    => 'view, edit, delete'
        ];

        $this->posts[] = $newPost;

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully!');
    }

    public function show(string $id)
    {
        foreach ($this->posts as $post) {
            if ($post['id'] == $id) {
                return view('posts.show', compact('post'));
            }
        }
        return "Post not found.";
    }

    public function edit(string $id)
    {
        foreach ($this->posts as $post) {
            if ($post['id'] == $id) {
                return view('posts.edit', compact('post'));
            }
        }
        return 'Post not found.';
    }

    public function update(Request $request, string $id)
    {
        foreach ($this->posts as &$post) {
            if ($post['id'] == $id) {
                $post['title'] = $request->input('title');
                break;
            }
        }
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully!');
    }

    public function destroy(string $id)
    {
        $this->posts = array_filter($this->posts, function ($post) use ($id) {
            return $post['id'] != $id;
        });

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
