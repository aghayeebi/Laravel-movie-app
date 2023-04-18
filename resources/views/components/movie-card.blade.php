<div class="mt-8">
    <a href="{{ route('movies.show',['id'=>$movie['id']]) }}">
        <img src="{{ $movie['poster_path'] }}"
             alt="poster" class="hover:opacity-75 transition
                        ease-in-out duration-150">
    </a>
    <div class="mt2">
        <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
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
            <span class="ml-1">{{ $movie['vote_average']}}%</span>
            <span class="mx-2">|</span>
            <span>{{ $movie['release_date'] }}</span>
        </div>
        <div class="text-gray-400  text-sm ">
           {{ $movie['genres'] }}
            {{--                                @foreach($movie['genre_ids'] as $id => $genreIds)--}}
            {{--                                    @foreach($genreList as $genre )--}}
            {{--                                        @if($genreIds ===$genre['id'])--}}
            {{--                                            {{$genre['name']}}--}}
            {{--                                        @endif--}}
            {{--                                    @endforeach--}}
            {{--                                    @if($id !== (count($movie['genre_ids'])-1))--}}
            {{--                                        |--}}
            {{--                                    @endif--}}

            {{--                                @endforeach--}}

        </div>
    </div>
</div>
<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
