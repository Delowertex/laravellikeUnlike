@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
        @if(Session::has('status'))
            <p class="pb-4 text-red-500">
                {{Session::get('status')}}
            </p>
        @endif
            <form action="{{route('login')}}" method="POST">
                @csrf
                
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
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>

                </div>

                <div>
                    <button type="submit" class="w-full px-4 py-3 font-medium text-white bg-blue-500 rounded-lg">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection