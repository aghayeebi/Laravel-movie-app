<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Movie App</title>
    @livewireStyles
    <link rel="icon" type="image/x-icon" href="/img/favicon-32x32.png">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>
<body class="font-sans bg-gray-900 text-white">

<nav class="border-b border-gray-800">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
        <ul class="flex items-center">
            <li class="ml-24">
                <a href="{{ route('movies.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" stroke-width="0" fill="currentColor"></path>
                    </svg>
                </a>
            </li>
            <li class="md:ml-16  mt-3 md:mt-0">
                <a href="{{route('movies.index')}}" class="hover:text-gray-300">Movies</a>
            </li>
            <li class="md:ml-6   mt-3 md:mt-0">
                <a href="#" class="hover:text-gray-300">TV Shows</a>
            </li>
            <li class="md:ml-6    mt-3 md:mt-0">
                <a href="{{route('actors.index')}}" class="hover:text-gray-300">Actors</a>
            </li>
        </ul>
        <div class="flex flex-col md:flex-row items-center ">
            <livewire:search-dropdown/>

        </div>

    </div>
    </div>
</nav>
@yield('content')
@livewireScripts
@yield('scripts')
</body>
</html>
