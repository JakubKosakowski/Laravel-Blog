<x-app-layout>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="mt-4 px-12">
            <x-input-label for="title" class="text-center" :value="__('Title')" />
                <x-text-input id="title" maxlength="255" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4 px-12">
            <x-input-label for="content" class="text-center" :value="__('Content')" />
                <textarea id="content" maxlength="1500" class="block mt-1 w-full form-control @error('description') is-invalid @enderror" name="content" required autocomplete="content" autofocus>
                    {{old('content')}}
                </textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-4">
                {{ __('Post') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
