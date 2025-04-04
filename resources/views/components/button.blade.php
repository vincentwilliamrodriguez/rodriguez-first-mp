@props([
    'colorInitial' => 'bg-pink-600',
    'colorHover' => 'hover:bg-pink-500 focus:bg-pink-500',
    'colorActive' => 'active:bg-pink-700']
)

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-4 py-2 {$colorInitial} border border-transparent rounded-md font-semibold text-xs text-white tracking-widest {$colorHover} {$colorActive} focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition-all ease-in-out duration-150 scale-100 hover:scale-105 font-smoothing-none"]) }}>
    {{ $slot }}
</button>
