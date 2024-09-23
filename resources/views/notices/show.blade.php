<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-4">{{ $notice->title }}</h1>
            <div class="text-gray-700 mb-4">{{ $notice->description }}</div>

            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-2">Category:</h2>
                <div class="flex flex-wrap gap-1">
                    <span
                        class="inline-block bg-gray-100 text-gray-800 px-2 py-1 text-xs font-semibold rounded-full">{{ $notice->category->title }}</span>
                </div>
                <div class="flex flex-wrap gap-1">
                    <span
                        class="inline-block bg-gray-100 text-gray-800 px-2 py-1 text-xs font-semibold rounded-full">{{ $notice->user->name }}</span>
                </div>
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
        </div>

        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Comments</h2>

            @if ($notice->comments && $notice->comments->count() > 0)
                @foreach ($notice->comments as $comment)
                    <div class="mb-4">
                        <div class="text-gray-700">{{ $comment->content }}</div>
                        <div class="text-sm text-gray-500">by {{ $comment->user->name }} on
                            {{ $comment->created_at->format('M d, Y') }}</div>
                        @if (auth()->check() && auth()->user()->id == $comment->user_id)
                            <div class="mt-2">
                                <a href="{{ route('comments.edit', $comment->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-blue-200 rounded-lg hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Edit
                                </a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        onclick="return confirm('Are you sure you want to delete this comment?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-gray-700">No comments yet.</p>
            @endif

            @if (auth()->check())
                <form action="{{ route('comments.store', $notice->notice_id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Add a Comment:</label>
                        <textarea id="content" name="content" rows="3"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Submit
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
