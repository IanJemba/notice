<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notice Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">Title: {{ $notice->title }}</h3>
                    <p class="mt-4">Description: {{ $notice->description }}</p>
                    <p class="mt-4">User ID: {{ $notice->user_id }}</p>
                    <p class="mt-4">Category ID: {{ $notice->category_id }}</p>

                    <a href="{{ route('notices.index') }}"
                        class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back
                        to Notices</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
