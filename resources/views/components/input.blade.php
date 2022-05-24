@props(['disabled' => false, 'isError' => false])

@php
$baseClass = 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200
focus:ring-opacity-50 read-only:bg-gray-50';
$errorClass = 'rounded-md shadow-sm border-red-300 focus:border-red-300 focus:ring focus:ring-red-200
focus:ring-opacity-50 read-only:bg-gray-50';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $isError ? $errorClass : $baseClass]) !!}>
