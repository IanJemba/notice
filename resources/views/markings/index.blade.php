<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        @if (Auth::user()->role == 'admin')
                        <div class="p-4">
                            <a href="{{ route('markings.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Marking</a>
                        </div>
                        @endif
                    @endauth
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Color</th>
                                <th class="border px-4 py-2">Created At</th>
                                <th class="border px-4 py-2">Updated At</th>
                                @auth
                                    @if (Auth::user()->role == 'admin')
                                    <th class="border px-4 py-2">Edit</th>
                                    <th class="border px-4 py-2">Delete</th>
                                    @endif
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($markings as $Marking)
                                <tr>
                                    <td class="border px-4 py-2">{{ $Marking->id }}</td>
                                    <td class="border px-4 py-2">{{ $Marking->title }}</td>
                                    <td class="border px-4 py-2" style="background-color: {{$Marking->color}};"></td>
                                    <td class="border px-4 py-2">{{ $Marking->created_at }}</td>
                                    <td class="border px-4 py-2">{{ $Marking->updated_at }}</td>
                                    @auth
                                        @if (Auth::user()->role == 'admin')
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('markings.edit', $Marking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('markings.destroy', $Marking->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    @endauth
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
