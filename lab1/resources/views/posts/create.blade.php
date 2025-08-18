@extends('layouts.app')

@section('title', 'Post Details')

@section('content')

<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" id="title" name="title" 
                     value="{{ old('title') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea id="description" name="description" rows="3"
            value="{{ old('description') }}"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"></textarea>
        @error('description')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
                    </div>
       

        <div>
            <label for="creator" class="block text-gray-700 font-medium mb-1">Post Creator</label>
            <select name="post_creator" class="form-control">
            @foreach($creators as $creator)
                <option value="{{ $creator->id }}">{{ $creator->name }}</option>
            @endforeach
        </select>
        @error('post_creator')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
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