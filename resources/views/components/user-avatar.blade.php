@props(['user','size'])

@if ($user->image)
    {{-- <img src="{{$post->user->image}}" alt="{{$post->user->name}}" class="w-12 h-12 rounded-full"> --}}
    <img src="{{$user->imageUrl()}}" alt="{{$user->name}}" class="{{$size}} rounded-full">
@else
    <img src="https://cdn-icons-png.flaticon.com/512/6858/6858504.png" alt="{{$user->name}}" class="{{$size}} rounded-full">
@endif