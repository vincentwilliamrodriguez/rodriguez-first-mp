
@props(['disabled' => false])

<form action="{{ route('movies') }}" method="GET" class="relative h-12 w-full flex items-stretch border-2 border-gray-300  rounded-2xl shadow-sm overflow-hidden">
    <input required name='q' placeholder='Type Movie Name Here...' {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'flex-1 bg-transparent border-none text-white caret-white outline-none border-none focus:outline-none focus:border:none hover:bg-[#ffffff0f] transition-all']) !!}>

    <button type='submit' class='p-0 border-none bg-transparent'>
        <x-css-search class='text-white h-full basis-6 box-content pl-2 pr-3 border-l-2 border-gray-300 hover:cursor-pointer hover:text-black hover:bg-gray-300 active:bg-gray-400 transition-all'/>
    </button>

</form>


