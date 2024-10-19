<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto px-4 py-2 flex flex-col text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex items-center flex-col justify-start">
                <div>
                    <div>
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $post->title }}
                        </h2>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p>{{$post -> content}}</p>
                    </div>
                </div>
                @can('edit_post', $post)
                <div class="flex justify-end w-auto">
                    <a href="{{route('posts.edit', $post->id)}}">
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button>
                    </a>
                </div>
                @endcan
            </div>
            <div class="bg-white dark:bg-gray-800 mt-2 mb-3 overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-start">
                @foreach($post->comments as $comment)
                <div class="px-5">
                    <strong>{{ $comment->user ? $comment->user->name : 'Guest' }}</strong> said:
                    <p>{{ $comment->comment }}</p>
                    @can('delete_comment', $comment)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                    <hr>
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
                                class="w-full h-32 p-3 border text-black border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                placeholder="Enter your comment here..."
                                name="comment"
                                required autocomplete="comment"></textarea>
                            <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
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
