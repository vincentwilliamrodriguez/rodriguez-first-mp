<x-app-layout>
    <div class="flex-1 pt-[4vh] pb-[10vh] w-[1000px] flex flex-col justify-center items-center">
        <x-search-bar></x-search-bar>

        <div class="text-white flex flex-col justify-center items-center w-full mt-2 bg-[#00000033] rounded-lg px-8 py-6">
            <p class='relative self-start mb-4 text-2xl translate-x-4'>
                <span class='absolute left-0 top-0 bottom-0 w-[5px] bg-pink-700 translate-x-[-16px] rounded-s-sm'></span>

                @if ($movies->count() > 0)
                    Search Results For <span class="text-pink-300">{{ $query }}</span>
                @else
                    No movies found.
                @endif
            </p>

            <div class="grid grid-cols-4 justify-center gap-4 mb-4">
                @foreach ($movies as $movie)
                    <div class="flex justify-center items-center flex-1 basis-[200px] bg-[#444444] rounded-md shadow-xl select-none overflow-hidden opacity-70 hover:opacity-100 transition-all">
                        @if ($movie->poster !== 'N/A')
                            <img src="{{ $movie->poster }}" class='w-full h-full'>
                        @else
                            <x-pixelarticons-movie class="text-[#999999] h-12"/>
                        @endif

                    </div>

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
