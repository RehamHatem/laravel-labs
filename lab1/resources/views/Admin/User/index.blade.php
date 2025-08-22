<x-app-layout>

<div class="container mx-auto mt-2">
    {{-- @if (session('success'))
        <div class="mb-4 px-4 py-2 rounded-lg bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center items-center ">
    <a href="{{ route('posts.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
        Create Post
    </a>
</div> --}}


    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    {{-- <th class="py-3 px-4 border">#</th> --}}
                    <th class="py-3 px-4 border">Name</th>
                    <th class="py-3 px-4 border">Email</th>
                    <th class="py-3 px-4 border"> Is Admin</th>
                    <th class="py-3 px-4 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user )
                    <tr class="hover:bg-gray-100">
                        {{-- <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td> --}}
                        <td class="py-2 px-4 border">{{ $user->name }}</td>
                        <td class="py-2 px-4 border">{{ $user->email}}</td>
                        {{-- <td class="py-2 px-4 border">{{ $post->posted_by }}</td> --}}
                        <td class="py-2 px-4 border">
                            {{ $user->is_admin ? 'Yes':'No' }}
                        </td>
                        <td class="py-2 px-4 border text-center space-x-2">
                           
                            <form action="{{ route('admin.user.changeRole', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('Patch')
                                <button type="submit" 
                                        class="{{ $user->is_admin ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white py-1 px-3 rounded text-sm">
                                    Change Role
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</x-app-layout>
