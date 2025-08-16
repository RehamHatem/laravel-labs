@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container mx-auto mt-2">
    <div class="flex justify-center items-center ">
    <a href="{{ route('posts.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
        Create Post
    </a>
</div>


    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 border">#</th>
                    <th class="py-3 px-4 border">Title</th>
                    <th class="py-3 px-4 border">Posted By</th>
                    <th class="py-3 px-4 border">Created At</th>
                    <th class="py-3 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border">{{ $post['title'] }}</td>
                        <td class="py-2 px-4 border">{{ $post['posted_by'] }}</td>
                        <td class="py-2 px-4 border">
                            {{ \Carbon\Carbon::parse($post['created_at'])->format('Y-m-d') }}
                        </td>
                        <td class="py-2 px-4 border text-center space-x-2">
                            <a href="{{ route('posts.show', $post['id']) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">
                                View
                            </a>
                            <a href="{{ route('posts.edit', $post['id']) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure?')" 
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
