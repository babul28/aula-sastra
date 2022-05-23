@props(['href', 'isActive'])

@php
$baseClass = 'inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800
dark:hover:text-gray-200';
$activeClass = $baseClass . ' text-gray-800 dark:text-gray-100';

$class = ($isActive ?? false) ? $activeClass : $baseClass;
@endphp

<li class="relative px-6 py-3">
    @if ($isActive ?? false)
    <!-- Active items have the snippet below -->
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    @endif

    <a class="{{ $class }}" href="{{ $href }}">
        {{ $icon }}
        <span class="ml-4">{{ $slot }}</span>
    </a>
</li>
