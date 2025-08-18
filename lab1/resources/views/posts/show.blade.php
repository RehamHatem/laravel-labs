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
            <strong>Created At :-</strong> {{ $post->created_at->format('l jS \\of F Y h:i:s A') }}
        </p>
    </div>

</div>
@endsection
