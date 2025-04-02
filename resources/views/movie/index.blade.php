<x-app-layout>
    @if ($movies->count() > 0)
        @foreach ($movies as $movie)
            <div class="flex flex-col mb-4">
                @foreach ($movie->toArray() as $property => $value)
                    @if ($property === 'poster')
                        <img src="{{ $value }}" class='w-[300px]'>
                    @else
                        <div class=""><span class='font-black'>{{ $property }}</span>: {{ $value }}</div>
                    @endif
                @endforeach
            </div>
        @endforeach
    @else
        <p class='text-2xl'>No movies found.</p>
    @endif
</x-app-layout>
