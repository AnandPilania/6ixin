@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-200 text-gray-700 hover:text-gray-800 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded'
            : 'text-gray-600 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded';
$iconClasses = ($active ?? false)
            ? 'text-gray-500'
            : 'text-gray-400 group-hover:text-gray-500';
@endphp
<div>
   <span aria-current="page" {{ $attributes->merge(['class' => $classes]) }}>
 <span class="{{$iconClasses}}">
   <x-form.icon
   path='{{$icon}}'
   width='6'
   height='6'
   iconWidth='0'
   class=' '
   />
  </span>
   </span>
</div>
