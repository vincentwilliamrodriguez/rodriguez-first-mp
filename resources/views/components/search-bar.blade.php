
@props(['disabled' => false])

<div class="relative w-full flex items-stretch border-2 border-gray-300 rounded-2xl shadow-sm overflow-hidden">
    <input placeholder='e.g. The Greatest Showman' {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'flex-1 bg-transparent border-none text-white caret-white focus:outline-none focus:border:none relative']) !!}>

    <x-css-search class='text-white h-full basis-6 box-content pl-2 pr-3 border-l-2 border-gray-300 hover:cursor-pointer hover:text-black hover:bg-gray-300 transition-all'/>
</div>


