<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-extrabold mb-6 text-gray-900">{{ $notice->title }}</h1>
            <p class="text-lg text-gray-600 leading-relaxed mb-6">{{ $notice->description }}</p>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Details</h2>
                <div class="flex flex-wrap items-center space-x-2">
                    <p class="inline-block bg-blue-100 text-blue-800 px-3 py-1 text-sm font-semibold rounded-full">
                        Category: {{ $notice->category->title }}
                    </p>
                </div>
                <div class="flex flex-wrap items-center space-x-2 mt-2">
                    <p class="inline-block bg-gray-300 text-gray-600 px-3 py-1 text-sm font-semibold rounded-full">
                        Posted by: {{ $notice->user->name }}
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('notices.index') }}"
                    class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">
                    Back to Notices
                </a>
                @if (auth()->check())
                    <div class="flex space-x-3">
                        @if ($notice->user_id == auth()->user()->id)
                            <a href="{{ route('notices.edit', $notice->notice_id) }}"
                                class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Edit
                            </a>
                        @endif
                        @if ($notice->user_id == auth()->user()->id || auth()->user()->role == 'admin')
                            <form action="{{ route('notices.destroy', $notice->notice_id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300"
                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                    Delete
                                </button>
                            </form>
                        @endif
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
                        @if (auth()->check())
                            <div class="mt-2 flex space-x-2">
                                @if (auth()->user()->id == $comment->user_id)
                                <a href="{{ route('comments.edit', $comment->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Edit
                                </a>
                                @endif
                                @if (auth()->user()->role == 'admin' || auth()->user()->id == $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                            onclick="return confirm('Are you sure you want to delete this comment?');">
                                            Delete
                                        </button>
                                    </form>
                                @endif
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
