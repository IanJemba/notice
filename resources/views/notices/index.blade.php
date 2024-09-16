@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Notices</h1>
        {{-- @if (auth()->check() && auth()->user()->role == 'author') --}}
        <a href="{{ route('notices.create') }}"
            class="inline-flex items-center px-3 py-2 mb-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Notice
        </a>
        {{-- @endif --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($notices as $notice)
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow-md transition-transform duration-300 transform hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('notices.show', $notice->notice_id) }}">
                        <h5 class="mb-2 text-xl font-semibold text-gray-900">{{ $notice->title }}</h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700">{{ $notice->description }}</p>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('notices.show', $notice->notice_id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        {{-- @if (auth()->check() && auth()->user()->role == 'author' && $notice->user_id == auth()->user()->id) --}}
                        <a href="{{ route('notices.edit', $notice->notice_id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-700 bg-blue-200 rounded-lg hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Edit
                        </a>
                        <form action="{{ route('notices.destroy', $notice->notice_id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                Delete
                            </button>
                        </form>
                        {{-- @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
