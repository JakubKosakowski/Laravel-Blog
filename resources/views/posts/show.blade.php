<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 text-white">
            {{$post -> content}}
        </div>
        <a href="{{route('posts.edit', $post->id)}}">
            <button class="btn btn-success">
                Edit
            </button>
        </a>
    </x-slot>
</x-app-layout>
