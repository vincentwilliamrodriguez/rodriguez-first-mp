@props(['movie'])

@php
    $movieDetails = ['rating' => false, 'runtime' => false, 'genre' => false];
    $movieDetailsIcons = [
        'rating' => 'eos-star',
        'runtime' => 'eos-access-time-filled-o',
        'genre' => 'eos-theater-comedy'
    ];

    $areDetailsShown = false;

    foreach ($movieDetails as $movieDetail => $isShown) {
        $value = $movie[$movieDetail];

        if ($value != (($movieDetail === 'rating') ? 0 : 'N/A')) {
            $areDetailsShown = true;
            $movieDetails[$movieDetail] = true;
        }
    }
@endphp

<div class="group relative basis-[200px] bg-[#444444] rounded-md shadow-xl select-none overflow-hidden opacity-90 scale-100 hover:scale-105 transition-all duration-500 font-smoothing-none">
    @if ($movie->poster !== 'N/A')
        <img src="{{ $movie->poster }}" class='h-full object-cover pointer-events-none select-none'>
    @else
        <div class="h-full w-full flex justify-center items-center">
            <x-pixelarticons-movie class="text-[#999999] h-24 pointer-events-none"/>
        </div>
    @endif

    <div class="absolute top-0 bottom-0 left-0 right-0 opacity-0 group-hover:opacity-100 bg-gradient-to-b from-transparent from-0% via-[#000000d9] via-60% to-black to-100% transition-all duration-500"></div>

    <div class="flex flex-col justify-start items-start translate-y-0 group-hover:translate-y-[-100%] px-4 py-3 gap-3 transition-all duration-500">
        <h2 class="text-xl {{!$areDetailsShown ? 'mb-[-6px]' : 'mb-[-8px]'}}">
            {{ $movie->title }}
        </h2>

        @if ($areDetailsShown)
            <div class="flex gap-2">
                @foreach ($movieDetails as $movieDetail => $isShown)
                    @if ($isShown)
                        <div class="flex items-center gap-1 text-[0.6rem] leading-[0.6rem] w-[max-content] border-2 px-2 py-1 rounded-full overflow-hidden text-ellipsis">
                            <div class="w-4">
                                @svg($movieDetailsIcons[$movieDetail])
                            </div>

                            <p class='pt-1'>{{ $movie[$movieDetail] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        <p class="text-xs text-[#B1B1B1] text-pretty" style="word-break: break-word;">
            {{ ($movie->plot != 'N/A') ? $movie->plot : 'No description available.' }}
        </p>

        <x-button class='self-center opacity-90 justify-center gap-1 w-min select-none' onclick="window.open('https://www.imdb.com/title/{{ $movie->imdbID }}', '_blank')">
            <x-css-external />
            IMDb
        </x-button>
    </div>
</div>
