<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-green-300">
    <nav class="p-6 bg-white flex justify-between mb-3">
        <ul class="flex items-center">
            <li>
            <a href="/" class="p-3" >Home </a>
            </li>
            <li>
            <a href="{{ route('dashboard')}}" class="p-3">Dashbord </a>
            </li>
            <li>
            <a href="{{route('posts')}}" class="p-3">Posts </a>
            </li>
        </ul>
        <ul class="flex items-center">
            {{-- if the person login --}}
            @auth
            <li>
            <a href="" class="p-3" >{{auth()->user()->name}} (Email-{{auth()->user()->email}})</a>
            </li>
            <li>
            <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                @csrf
                    <button type="submit">Logout </button>

                </form>
            </li>
            @endauth

            {{-- when the person don't login --}}
            @guest
                    <li>
                        <a href="{{route('register')}}" class="p-3">Register  </a>
                    </li>
                     <li>
                     <a href="{{route('login')}}" class="p-3">Login  </a>
                    </li>
                
            @endguest
           
            
        </ul>

    </nav>

    @yield('content')
</body>
</html>