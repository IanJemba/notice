<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-4">
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Category</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Created At</th>
                                <th class="border px-4 py-2">Updated At</th>
                                <th class="border px-4 py-2">Edit</th>
                                <th class="border px-4 py-2">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="border px-4 py-2">{{ $category->id }}</td>
                                    <td class="border px-4 py-2">{{ $category->title }}</td>
                                    <td class="border px-4 py-2">{{ $category->description }}</td>
                                    <td class="border px-4 py-2">{{ $category->created_at }}</td>
                                    <td class="border px-4 py-2">{{ $category->updated_at }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
