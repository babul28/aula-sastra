@props(['title', 'count', 'color'])

@php
switch ($color) {
case 'orange':
$cardColor = 'text-orange-500 bg-orange-100 dark:text-orange-100 dark:bg-orange-500';
break;

case 'red':
$cardColor = 'text-red-500 bg-red-100 dark:text-red-100 dark:bg-red-500';
break;

case 'yellow':
$cardColor = 'text-yellow-500 bg-yellow-100 dark:text-yellow-100 dark:bg-yellow-500';
break;

case 'green':
$cardColor = 'text-green-500 bg-green-100 dark:text-green-100 dark:bg-green-500';
break;

case 'blue':
$cardColor = 'text-blue-500 bg-blue-100 dark:text-blue-100 dark:bg-blue-500';
break;

default:
$cardColor = 'text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-500';
}
@endphp

<!-- Card -->
<div class="flex items-center p-4 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="p-3 mr-4 rounded-full {{ $cardColor }}">
        {{ $icon }}
    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ number_format($count, 0, ',', '.') }}
        </p>
    </div>
</div>
