<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12 text-white">
            <x-button route="posts.create">
                Create post
            </x-button>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ Str::limit($post->content, 50) }}</td> <!-- Limiting content for better table display -->
                            <td>
                                <button class="btn btn-success delete" data-id="{{$post->id}}">
                                    Delete
                                </button>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
