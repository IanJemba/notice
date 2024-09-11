<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Notice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('notices.update', $notice->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" class="mt-1 block w-full" value="{{ old('title', $notice->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full" required>{{ old('description', $notice->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                            <input type="number" id="user_id" name="user_id" class="mt-1 block w-full" value="{{ old('user_id', $notice->user_id) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category ID</label>
                            <input type="number" id="category_id" name="category_id" class="mt-1 block w-full" value="{{ old('category_id', $notice->category_id) }}" required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        <a href="{{ route('notices.index') }}" class="ml-2 text-gray-500">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
