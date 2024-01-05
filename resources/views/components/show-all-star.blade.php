@props(['rating_number', 'size_number'])

@php
$rating = $rating_number ?? 0; // Replace with your actual rating number

@endphp
@for ($i = 1; $i <= 5; $i++) @if ($i <=$rating) @include('components.fill-star', ['size'=> $size_number ?? 13])
    @else
    @include('components.nofill-star', ['size'=> $size_number ?? 13])
    @endif
    @endfor