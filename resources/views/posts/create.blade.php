<x-app-layout>
    <div class="container mx-auto px-4 py-2 flex flex-col justify-center">
        <form class="flex flex-col items-center" method="POST" action="{{ route('posts.store') }}">
            @csrf
    
            <div class="w-1/2 mt-4">
                <x-input-label for="title" class="text-center" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title') }}" placeholder="Enter your title here..." required autocomplete="title" />
            </div>
    
            <div class="w-1/2 mt-4">
                <div class="row mb-3">
                    <label for="content" class="block font-medium text-sm text-gray-700 dark:text-gray-300 text-center">Opis</label>
                    <div class="col-md-6 flex items-center">
                        <textarea 
                            id="content" maxlength="1500"
                            class="w-full h-32 p-3 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            placeholder="Enter your post here..."
                            name="content"
                            required autocomplete="content"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
            </div>
    
            <div class="flex items-center justify-center mt-4">
                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                    Create
                </button>
            </div>
        </form>
    </div>
    
</x-app-layout>

