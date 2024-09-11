<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <td class="border px-4 py-2">{{ $notice->id }}</td>
                                    <td class="border px-4 py-2">{{ $notice->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($notice->description, 50) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('notices.show', $notice->id) }}"
                                            class="text-blue-500">View</a>
                                        <a href="{{ route('notices.edit', $notice->id) }}"
                                            class="text-yellow-500 ml-2">Edit</a>
                                        <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2"
                                                onclick="return confirm('Are you sure you want to delete this notice?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('notices.create') }}"
                        class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                        New Notice</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
