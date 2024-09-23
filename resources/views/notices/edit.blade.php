<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Edit Notice</h1>

        <form action="{{ route('notices.update', $notice->notice_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="block w-full border-gray-300 rounded-md shadow-sm" value="{{ $notice->title }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm"
                    required>{{ $notice->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Author</label>
                <select name="user_id" id="user_id" class="block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
