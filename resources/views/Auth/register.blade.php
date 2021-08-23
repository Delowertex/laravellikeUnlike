@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error ('name') 
                        <div class="mt-2 text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error ('email') 
                        <div class="mt-2 text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" class="w-full p-4 bg-gray-100 border-2 @error('password') border-red-500 @enderror rounded-lg" value="{{old('password')}}">
                    @error ('password') 
                        <div class="mt-2 text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password Again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your Password" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error ('password_confirmation') 
                        <div class="mt-2 text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-3 font-medium text-white bg-blue-500 rounded-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection