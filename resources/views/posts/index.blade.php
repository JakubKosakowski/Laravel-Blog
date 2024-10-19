<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
                <a href="{{ route('posts.create') }}">
                    <button class="bg-indigo-900 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Create Post
                    </button>
                </a>
        </div>
        

        @foreach($posts as $post)
            <div class='py-2'>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-3xl font-bold text-white">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h1>
                            <h3 class="text-1xl">by <span class="text-lg font-bold">{{$post->user->name}}</span></h3>
                        </div>
                        @can('delete_post', $post)
                            <button class="bg-indigo-900 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded delete" data-id="{{$post->id}}">
                                Delete
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </x-slot>
</x-app-layout>
