<x-guest-layout>
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="title" class="text-center" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$post->title}}" required autocomplete="title" />
        </div>

        <div class="mt-4">
            <div class="row mb-3">
                <label for="content" class="col-md-4 col-form-label text-md-end">Opis</label>
                <div class="col-md-6">
                    <textarea id="content" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="content" required autocomplete="content" autofocus>{{ $post->content }}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        <x-text-input id="user_id" name="user_id" type="text" value="{{ $post->user_id }}" hidden/>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-4">
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

