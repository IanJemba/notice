<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    @php
        $totalUsers = $statistics['users'];
        $totalNotices = $statistics['notices'];
        $totalComments = $statistics['comments'];
        $totalCategories = $statistics['categories'];
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Users') }}
                        </h2>
                        <p class="text-3xl text-gray-800">{{ $totalUsers }}</p>
                    </div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Posts') }}
                        </h2>
                        <p class="text-3xl text-gray-800">{{ $totalNotices }}</p>
                    </div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Comments') }}
                        </h2>
                        <p class="text-3xl text-gray-800">{{ $totalComments }}</p>
                    </div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Categories') }}
                        </h2>
                        <p class="text-3xl text-gray-800">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
