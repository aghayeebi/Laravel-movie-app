@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$movie['poster_path']}}" alt="{{$movie['title']}}"
                 class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl flex-wrap font-semibold"> {{$movie['title']}} </h2>
                <div class="flex items-center text-gray-400 text-sm ">
                    <svg class="fill-current text-orange-500 w-4"
                         viewBox="0 0 331 281"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M165.508 0L204.461 107.102L330.517 107.102L228.536 173.295L267.489 280.398L165.508 214.205L63.5276 280.398L102.481 173.295L0.5 107.102L126.555 107.102L165.508 0Z"
                            fill="#FCE466"/>
                        <path
                            d="M165.508 1.46288L203.992 107.273L204.111 107.602H204.461L328.828 107.602L228.264 172.876L227.93 173.092L228.066 173.466L266.509 279.165L165.781 213.785L165.508 213.609L165.236 213.785L64.5078 279.165L102.951 173.466L103.087 173.092L102.753 172.876L2.18871 107.602L126.555 107.602H126.905L127.025 107.273L165.508 1.46288Z"
                            stroke="#FCE466" stroke-opacity="0.94"/>
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $movie['genres'] }}
                        {{--                           @foreach($movie['genres'] as $genre)--}}
                        {{--                            {{$genre['name']}}--}}
                        {{--                            @if(!$loop->last)--}}
                        {{--                                ,--}}
                        {{--                            @endif--}}
                        {{--                        @endforeach--}}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4 ">
                        @foreach($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>

                        @endforeach

                    </div>
                </div>

                <div x-data="{ isOpen : false  }"></div>
                @if(count($movie['videos']['results']) > 0)

                    <div class="mt-12">
                        <a href="https://www.youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}">
                            {{--                        {{}}--}}
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5
                    py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg class="w-6 fill-current " viewBox="0 0 478 478"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M475.5 239C475.5 369.615 369.615 475.5 239 475.5C108.385 475.5 2.5 369.615 2.5 239C2.5 108.385 108.385 2.5 239 2.5C369.615 2.5 475.5 108.385 475.5 239Z"
                                        stroke="black" stroke-width="5"/>
                                    <path d="M153.959 105.802L387.973 239.136L155.495 375.131L153.959 105.802Z"
                                          fill="black"
                                          stroke="black"/>
                                </svg>

                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </a>
                    </div>
                @endif


            </div>

        </div>
    </div>

    </div>
    {{--    Cast -----------------------------------------------------------------------------------------------------------------------}}
    <div class="movie-cast border-b border-gray-100">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">

                @foreach($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500'.$cast['profile_path']}}"

                                 alt="{{$cast['name']}}" class="hover:opacity-75 transition ease-in-out duration-150
                                rounded border dark:border-neutral-700">
                        </a>
                        <div class="mt2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                            <div class="text-sm text-gray-400">
                                {{$cast['character']}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="movie-images" x-data="{isOpen : false, image:''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($movie['images']as $images)

                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image = '{{'https://image.tmdb.org/t/p/original'.$images['file_path']}}'"
                            href="#"
                        >
                            <img src="{{'https://image.tmdb.org/t/p/w500'.$images['file_path']}}" alt=""
                                 class="hover:opacity-75 transition ease-in-out duration-150 rounded border dark:border-neutral-700">
                        </a>
                    </div>

                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show.transition.opacity="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">times
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





@endsection
