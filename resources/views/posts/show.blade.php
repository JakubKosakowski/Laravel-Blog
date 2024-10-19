<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto px-4 py-2 flex flex-col text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex items-center flex-col justify-start">
                <div>
                    <div class="px-6 py-2">
                        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $post->title }}
                        </h2>
                    </div>
                    <div class="px-6 text-gray-900 dark:text-gray-100">
                        <p>{{$post -> content}}</p>
                    </div>
                    @can('edit_post', $post)
                    <a href="{{route('posts.edit', $post->id)}}">
                        <button class="bg-indigo-900 hover:bg-indigo-700 text-white font-bold py-2 px-6 ml-6 my-3 rounded">
                            Edit
                        </button>
                    </a>
                @endcan
                </div>
            </div>
            <div class="mt-5 mb-3 overflow-hidden flex flex-col justify-start">
                @foreach($post->comments as $comment)
                <div class="px-5 py-5 mt-5 dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <strong>{{ $comment->user ? $comment->user->name : 'Guest' }}</strong> said:
                    <p>{{ $comment->comment }}</p>
                    @can('delete_comment', $comment)
                        <form class="flex justify-end" action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-indigo-900 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
            </div>
            <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">Leave a comment</h1>
            <div class="w-1/2 mt-4">
                <div class="row mb-3">
                    <div class="col-md-6 flex items-center">
                        <form method="POST" action="{{ route('comments.store', $post->id)}}">
                            @csrf
        
                            <textarea 
                            id="comment" maxlength="1500"
                            class="w-full h-32 p-3 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            placeholder="Enter your comment here..."
                            name="comment"
                            required autocomplete="comment"></textarea>
                            <button type="submit" class="bg-indigo-900 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Comment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden shadow-sm mt-5 flex flex-row">
                
            </div>
        </div>
    </x-slot>
</x-app-layout>
