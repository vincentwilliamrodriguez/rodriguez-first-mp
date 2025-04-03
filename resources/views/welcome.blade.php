<x-app-layout>
    <div class="flex-1 pb-[10vh] flex justify-center items-center">
        <div class="flex gap-12">
            <img src="{{ Storage::url('images/movies-collage.png') }}" alt="Movies Collage" class="w-[500px] drop-shadow-[0_0_27px_#ffffff22] select-none">
            <div class="flex flex-col gap-2 items-center">
                <h1 class="text-white text-2xl text-center mb-6">Look up your<br>favorite movies—<br>anytime, anywhere</h1>
                <x-search-bar class="w-[400px]"></x-search-bar>
                <p class="text-center text-gray-400">or...</p>

                <x-button class="justify-center gap-2 w-min"
                    colorInitial="bg-pink-600"
                    colorHover="hover:bg-pink-500 focus:bg-pink-500"
                    colorActive="active:bg-pink-700">

                    <x-css-dice-5 />
                    Randomize

                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
