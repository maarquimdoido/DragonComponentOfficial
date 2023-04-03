@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200 dark:border-red-800 dark:bg-red-800 dark:text-gray-800 focus:border-red-800 dark:focus:border-red-800 focus:ring-red-800 dark:focus:ring-red-800 rounded-md shadow-sm']) !!}>
