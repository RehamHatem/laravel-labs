@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-gray-100 border rounded-lg p-6 mb-6 shadow">
        <h2 class="text-lg font-semibold mb-4">Post Info</h2>
        <p class="mb-2">
            <strong>Title :-</strong> {{ $post->title }}
        </p>
        <p class="mb-2">
            <strong>Description :-</strong> {{ $post->description }}
        </p>
    </div>
    <div class="bg-gray-100 border rounded-lg p-6 shadow">
        <h2 class="text-lg font-semibold mb-4">Post Creator Info</h2>
        <p class="mb-2">
            <strong>Name :-</strong> {{ $post->user->name ?? 'Unknown' }}
        </p>
        <p class="mb-2">
            <strong>Email :-</strong> {{ $post->user->email ?? 'N/A' }}
        </p>
        <p class="mb-2">
            <strong>Created At :-</strong> {{ $post->created_at }}
        </p>
    </div>

    <div class="bg-gray-100 border rounded-lg p-6 shadow">
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div>
            <label for="creator" class="block text-gray-700 font-medium mb-1">Comment Create</label>
            <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea id="content" name="content" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add Comment
            </button>
        </form>
        <h3 class="text-lg font-semibold mt-6">Comments</h3>
        @if($post->comments->isEmpty())
            <p class="text-gray-500">No comments yet.</p>
        @else
            <ul class="mt-4">
                @foreach($post->comments as $comment)
                    <li class="border-b py-2">
                        <p class="font-semibold">{{ $comment->user->name }}</p>
                        <p class="text-gray-600">{{ $comment->content }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>
@endsection
