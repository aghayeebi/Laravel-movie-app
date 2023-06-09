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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>
<body class="font-sans bg-gray-900 text-white">

<nav class="border-b border-gray-800">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
        <ul class="flex items-center">
            <li class="ml-24">
                <a href="{{ route('movies.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 text-gray-500 "
                         xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                         version="1.1" viewBox="0 0 463.038 463.038" enable-background="new 0 0 463.038 463.038">
                        <path
                            d="m245.581,458.565c26.148,8.237 54.309,5.04 81.441-9.25 39.508-20.809 71.014-61.745 86.439-112.314 12.84-42.099 12.781-85.584-0.167-122.446-13.225-37.648-38.271-63.979-70.526-74.141-17.41-5.485-35.674-5.882-54.286-1.179-16.177,4.087-32.755,6.395-49.385,6.934 0.047-6.78-0.129-13.239-0.492-19.385 62.606-3.68 112.415-55.771 112.415-119.284 0-4.143-3.358-7.5-7.5-7.5-51.719,0-95.864,33.029-112.465,79.1-9.817-35.855-25.227-51.887-26.203-52.874-2.901-2.933-7.614-2.959-10.563-0.071-2.949,2.886-2.999,7.627-0.128,10.592 0.079,0.082 8.026,8.408 15.635,26.551 11.874,28.309 14.45,59.836 14.304,82.879-16.683-0.529-33.315-2.841-49.542-6.941-18.61-4.702-36.875-4.305-54.286,1.179-32.255,10.161-57.301,36.492-70.526,74.141-12.948,36.862-13.008,80.348-0.167,122.446 15.424,50.568 46.93,91.506 86.438,112.313 17.317,9.121 35.052,13.724 52.4,13.724 9.833-0.001 19.541-1.479 28.977-4.452l.154-.048c0.008-0.003 0.095-0.029 0.103-0.032 9.075-2.884 18.669-2.884 27.823,0.025m90.258-443.245c-3.499,47.256-38.577,85.848-84.146,94.753l41.236-41.236c2.929-2.93 2.929-7.678 0-10.607-2.929-2.928-7.678-2.928-10.606,0l-41.236,41.236c8.904-45.569 47.495-80.647 94.752-84.146zm63.382,317.337c-14.055,46.081-43.619,84.742-79.081,103.419-23.513,12.385-47.698,15.225-69.944,8.216-0.022-0.007-0.132-0.041-0.154-0.048-6.033-1.918-12.236-2.875-18.433-2.875-6.178,0-12.35,0.952-18.332,2.854l-.122,.037c-0.002,0.001-0.097,0.03-0.099,0.031-22.244,7.009-46.43,4.168-69.944-8.216-35.463-18.678-65.025-57.339-79.081-103.419-24.356-79.852 2.942-159.659 60.854-177.903 14.717-4.637 30.228-4.954 46.104-0.942 39.671,10.024 81.607,10.023 121.275,0 15.874-4.011 31.386-3.695 46.104,0.942 57.911,18.245 85.209,98.052 60.853,177.904z"/>
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
                <a href="#" class="hover:text-gray-300">Actors</a>
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
</body>
</html>
