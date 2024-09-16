<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $notice->title }}</h1>

<<<<<<< HEAD
        <div class="mb-6">
            <p class="text-gray-700">{{ $notice->description }}</p>
=======
            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-2">Category:</h2>
                {{-- <div class="flex flex-wrap gap-1">
                    <span
                        class="inline-block bg-gray-100 text-gray-800 px-2 py-1 text-xs font-semibold rounded-full">{{ $notice->category->title }}</span>
                </div> --}}
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('notices.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300">
                    Back to Notices
                </a>
                @if (auth()->check() && auth()->user()->role == 'author' && $notice->user_id == auth()->user()->id)
                    <div>
                        <a href="{{ route('notices.edit', $notice->notice_id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-blue-200 rounded-lg hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Edit
                        </a>
                        <form action="{{ route('notices.destroy', $notice->notice_id) }}" method="POST"
                            class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
>>>>>>> 181af3ded4200c1c084e67387d40ee718963f623
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('notices.index') }}" class="text-blue-700">Back to list</a>
            <a href="{{ route('notices.edit', $notice->id) }}" class="text-blue-700">Edit</a>
            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-700">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
