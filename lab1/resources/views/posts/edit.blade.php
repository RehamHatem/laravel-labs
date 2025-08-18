@extends('layouts.app')

@section('title', 'Update Post')

@section('content')
<div class="w-full max-w-lg justify-content-center mx-auto mt-10">
  <form action="{{route('posts.update' , $post->id)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
  @csrf
  <!-- <input type="hidden" name="_token" value="gdhdjdopdjdpjdvsdl">   -->
  @method('PUT')
    <!-- <input type="hidden" name="_method" value="PUT"> -->
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
       id="title" type="text" placeholder="Title" value="{{ $post->title }}" name="title">
        @error('title')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
    </div>
   
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
        Description
      </label>
      <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description" name="description">
        {{ $post->description }}
      </textarea>
      @error('description')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror
    </div>
    
    <div>
    <label for="creator" class="block text-gray-700 font-medium mb-1">Post Creator</label>
     <select name="post_creator" class="form-control">
            @foreach($creators as $creator)
                <option value="{{ $creator->id }}" @if($creator->id == $post->user_id) selected @endif>{{ $creator->name }}</option>
            @endforeach
        </select>
         @error('post_creator')
      <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
  @enderror
</div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Update Post
      </button>
    </div>
  </form>
 

  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
@endsection