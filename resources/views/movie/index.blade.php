<x-app-layout>
    <div class="flex-1 pt-[4vh] pb-[10vh] w-[1000px] flex flex-col justify-start items-center">
        <x-search-bar value='{{ $query }}'></x-search-bar>

        <div class="text-white flex flex-col justify-center items-center w-full mt-2 bg-[#00000033] rounded-lg px-8 py-6">
            <p class='relative self-start mb-4 text-2xl translate-x-4'>
                <span class='absolute left-0 top-0 bottom-0 w-[5px] bg-pink-700 translate-x-[-16px] rounded-s-sm'></span>

                @if ($query === '')
                    Random Movies Generated:
                @else
                    @if ($error !== '')
                        Error: {{ $error }}
                    @else
                        @if ($movies->count() > 0)
                            Search Results For <span class="text-pink-300">{{ $query }}</span>
                        @else
                            No movies found.
                        @endif
                    @endif
                @endif
            </p>

            <div class="grid grid-cols-3 auto-rows-[493.95px] justify-center gap-6 mb-4">
                @foreach ($movies as $movie)
                    <x-movie-card :movie="$movie"></x-movie-card>

                        {{-- @foreach ($movie->toArray() as $property => $value)
                            @if ($property === 'poster')
                            @endif

    {{--
                            @if ($property === 'poster')
                                <img src="{{ $value }}" class='w-[300px]'>
                            @else
                                @if ($nullValues($property) !== $value)
                                    <div class=""><span class='font-black'>{{ $property }}</span>: {{ $value }}</div>
                                @endif
                            @endif

                        @endforeach --}}
                @endforeach
            </div>
        </div>




    </div>

</x-app-layout>
