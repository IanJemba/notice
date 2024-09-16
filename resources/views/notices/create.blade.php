@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Create Notice</h1>

        <form action="{{ route('notices.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-lg"
                    required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" rows="4"
                    required></textarea>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Create</button>
        </form>
    </div>
@endsection
