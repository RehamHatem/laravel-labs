<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
    <label for="image" class="block text-gray-700 font-medium mb-1">Post Image</label>
    <input type="file" id="image" name="image"
           accept="image/*"
           onchange="previewImage(event)"
           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    <img id="preview" class="mt-3 w-32 h-32 object-cover rounded mb-2 max-w-xs rounded shadow hidden"/>
</div>

       <script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('preview');
            img.src = e.target.result;
            img.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>

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
</x-app-layout>

