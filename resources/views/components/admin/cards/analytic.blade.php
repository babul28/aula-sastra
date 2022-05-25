@props(['title', 'count', 'color'])

@php
switch ($color) {
case 'orange':
$cardColor = 'text-orange-500 bg-orange-100';
break;

case 'red':
$cardColor = 'text-red-500 bg-red-100';
break;

case 'yellow':
$cardColor = 'text-yellow-500 bg-yellow-100';
break;

case 'green':
$cardColor = 'text-green-500 bg-green-100';
break;

case 'blue':
$cardColor = 'text-blue-500 bg-blue-100';
break;

default:
$cardColor = 'text-gray-500 bg-gray-100';
}
@endphp

<!-- Card -->
<div class="flex items-center p-4 bg-white rounded-lg shadow">
    <div class="p-3 mr-4 rounded-full {{ $cardColor }}">
        {{ $icon }}
    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-gray-700">
            {{ number_format($count, 0, ',', '.') }}
        </p>
    </div>
</div>
