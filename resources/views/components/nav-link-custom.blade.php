@props(['active', 'href', 'icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-600/20 font-bold transition-all'
            : 'flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/50 hover:text-white transition-all font-medium';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    <i class="fa-solid {{ $icon }} w-5 text-center"></i>
    <span>{{ $slot }}</span>
</a>