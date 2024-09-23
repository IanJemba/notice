<x-app-layout>

    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Edit Comment</h2>

            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Comment:</label>
                    <textarea id="content" name="content" rows="3"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ $comment->content }}</textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
