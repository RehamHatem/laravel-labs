<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trash Posts') }}
        </h2>
    </x-slot>
<div class="container mx-auto mt-2">
    @if (session('success'))
        <div class="mb-4 px-4 py-2 rounded-lg bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif
   
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
                        <td class="py-2 px-4 border">{{ $post->title }}</td>
                        <td class="py-2 px-4 border">{{ $post->user->name ?? 'Unknown' }}</td>
                        {{-- <td class="py-2 px-4 border">{{ $post->posted_by }}</td> --}}
                        <td class="py-2 px-4 border">
                            {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                        </td>
                        <td class="py-2 px-4 border text-center space-x-2">
                        
                            <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure?')" 
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('posts.restore', $post->id) }}" 
                               class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded text-sm">
                                Restore
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  

</div>
</x-app-layout>
