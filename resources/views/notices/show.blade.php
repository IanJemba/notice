@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $notice->title }}</h1>

        <div class="mb-6">
            <p class="text-gray-700">{{ $notice->description }}</p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('notices.index') }}" class="text-blue-700">Back to list</a>
            <a href="{{ route('notices.edit', $notice->id) }}" class="text-blue-700">Edit</a>
            <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-700">Delete</button>
            </form>
        </div>
    </div>
@endsection
