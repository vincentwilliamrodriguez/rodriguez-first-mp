@props(['colorInitial', 'colorHover', 'colorActive'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-4 py-2 {$colorInitial} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest {$colorHover} {$colorActive} focus:outline-none focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</button>
