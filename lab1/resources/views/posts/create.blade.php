@extends('layouts.app')

@section('title', 'Post Details')

@section('content')

<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" id="title" name="title" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"></textarea>
        </div>

        <div>
            <label for="creator" class="block text-gray-700 font-medium mb-1">Post Creator</label>
            <select id="creator" name="creator"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option>Ahmed</option>
                <option>Ali</option>
                <option>Omar</option>
            </select>
        </div>
        <div>
            <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                Create
            </button>
        </div>
    </form>
</div>
@endsection