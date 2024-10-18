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

        <div class="py-12 text-white">
            <h1>Comments</h1>
            @foreach($post->comments as $comment)
                <strong>{{ $comment->user ? $comment->user->name : 'Guest' }}</strong> said:
                <p>{{ $comment->comment }}</p>
                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endcan
                <hr>
            @endforeach
        </div>
        <div class="py-12 text-white">
            <h1>Leave a comment</h1>
            <form method="POST" action="{{ route('comments.store', $post->id)}}">
                @csrf

                <textarea id="comment" maxlength="1500" class="block mt-1 w-full text-black form-control @error('description') is-invalid @enderror" name="comment" required autocomplete="comment" autofocus>
                    {{old('comment')}}
                </textarea>

                <x-text-input id="user_id" name="user_id" type="text" value="{{ $user->id }}" hidden/>
                <x-text-input id="post_id" name="post_id" type="text" value="{{ $post->id }}" hidden/>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
