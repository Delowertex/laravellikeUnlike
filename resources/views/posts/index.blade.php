@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-white rounded-lg">
            <form action="{{route('posts')}}" method="POST" class="mb-4">
                @csrf

                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>
                    @error('body') <div class="mb-2 text-sm text-red-500">{{$message}}</div> @enderror
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 mb-4 font-medium text-white bg-blue-500 rounded">Post</button>
                </div>
            </form>

            @if($posts->count()) 
                @foreach($posts as $post) 
                    <div class="mb-4">
                        <a href="" class="font-bold">{{$post->user->name}} <span class="text-sm text-gray-600">{{$post->created_at->diffForHumans()}}</span></a>
                        <p class="mb-2">{{$post->body}}</p>
                        <div class="flex items-center">
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{route('posts.likes', $post->id)}}" method="POST" class="mr-2">
                                    @csrf
                                    <button type="submit" class="text-blue-600">Like</button>
                                </form>
                            @else
                                <form action="" method="POST" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-600">UnLike</button>
                                </form>
                            @endif
                            <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            @else 
                <p>There is no post.</p>
            @endif
        </div>
    </div>

@endsection