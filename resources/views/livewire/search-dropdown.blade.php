<div class="relative  mt-3 md:mt-0"
     x-data="{ isOpen : true }" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text" class=" text-sm bg-gray-800 rounded-full w-64 px-4 pl-8 py-1
                       focus:outline-none focus:shadow-outline"
        placeholder="Search"
        x-ref="search"
        @keydown.window="
        if (event.keyCode === 191)
        {
        event.preventDefault();
        $refs.search.focus();
        "
        @focus="isOpen =true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 266 283" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M248 122C248 189.379 192.483 244 124 244C55.5167 244 0 189.379 0 122C0 54.6213 55.5167 0 124 0C192.483 0 248 54.6213 248 122Z"
                fill="#D9D9D9"/>
            <path d="M199.502 218.763L209.211 210.56L265.11 274.567L255.401 282.77L199.502 218.763Z"
                  fill="#D9D9D9"/>
        </svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if(strlen($search) >= 2)
        <div
            class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4"
            x-show.transition.opacity="isOpen">
            @if($searchResults->count() > 0)
                <ul>
                    @foreach($searchResults as $result)
                        <li class="border-b bg-gray-700">
                            <a
                                @if($loop->last)
                                    @keydown.tab ="isOpen = false"
                                @endif
                                class="block hover:bg-gray-700 px3 py-3 flex items-center transition ease-in-out duration-150"
                                href="{{route('movies.show',$result['id'])}}">
                                @if($result['poster_path'])
                                    <img
                                        class="w-8"
                                        src="{{'https://image.tmdb.org/t/p/w92/'.$result['poster_path']}}"
                                        alt="{{$result['title'].'poster'}}">
                                @else
                                    <img src="https://via.placeholder.com/50x72" alt="" class="w-8">
                                @endif

                                <span class="ml-4">
                                    {{ $result['title'] .'-'. \Carbon\Carbon::parse($result['release_date'])->format('Y') }}
                                </span>
                            </a>
                            {{--                            <img src="{{'https://image.tmdb.org/t/p/w500/'.$result['poster_path'] }}"--}}
                            {{--                                 class="border-gray-800  rounded-full w-32 flex flex-col"--}}
                            {{--                                 alt="{{ $result['title'] }}">--}}

                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3"> No results for "{{$search}}"</div>
            @endif
        </div>

    @endif

</div>
