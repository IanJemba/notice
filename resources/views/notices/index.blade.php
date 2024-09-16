<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">Notice Board</h1>

        {{-- @if (auth()->check()) --}}
        <div class="text-center mb-6">
            <a href="{{ route('notices.create') }}"
                class="inline-flex items-center px-4 py-2 text-lg font-medium text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                + Create New Notice
            </a>
        </div>
        {{-- @endif --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($notices as $notice)
                @php
                    $colors = [
                        'bg-yellow-100',
                        'bg-pink-100',
                        'bg-green-100',
                        'bg-blue-100',
                        'bg-purple-100',
                        'bg-orange-100',
                    ];

                    // Use the id as seed for random number generator
                    // This will give each notice its own unique color
                    $id = $notice->notice_id;
                    mt_srand($id);

                    $color = $colors[mt_rand(0, count($colors) - 1)];

                    $size = ($loop->iteration % 3 == 0) ? 'lg:col-span-2' : 'w-full';
                @endphp

                <div class="{{ $color }} {{ $size }} p-6 shadow-lg rounded-lg transform hover:scale-105 transition-transform duration-300">
                    <a href="{{ route('notices.show', $notice->notice_id) }}">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $notice->title }}</h5>
                    </a>
                    <p class="mb-4 text-base text-gray-700">{{ Str::limit($notice->description, 120) }}</p>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('notices.show', $notice->notice_id) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-indigo-300">
                            Read More
                        </a>

                        {{-- Only show edit/delete options for authorized users --}}
                        {{-- @if (auth()->check() && auth()->user()->role == 'author' && $notice->user_id == auth()->user()->id) --}}
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('notices.edit', $notice->notice_id) }}"
                                class="px-3 py-2 text-sm font-medium text-gray-700 bg-blue-200 rounded-lg hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Edit
                            </a>

                            <form action="{{ route('notices.destroy', $notice->notice_id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300"
                                    onclick="return confirm('Are you sure you want to delete this notice?');">
                                    Delete
                                </button>
                            </form>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
