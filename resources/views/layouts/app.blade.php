<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
    <nav class="flex justify-between p-3 mb-6 bg-white">
        <ul class="flex items-center">
            <li class="p-3"><a href="/">Home</a></li>
            <li class="p-3"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="p-3"><a href="{{route('posts')}}">Posts</a></li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li class="p-3"><a href="">{{auth()->user()->name}}</a></li>
                <form action="{{route('logout')}}" method="POST" class="inline p-3">
                    @csrf 
                    <button type="submit">Logout</button>
                    
                </form>
            @endauth
            @guest  
                <li class="p-3"><a href="{{route('login')}}">Login</a></li>
                <li class="p-3"><a href="{{route('register')}}">Register</a></li>
            @endguest
            
            
            
        </ul>
    </nav>
    @yield('content')
</body>
</html>