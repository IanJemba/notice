<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Welcome to the Admin Dashboard</h3>
                        <p class="mt-2 mx-4 text-gray-700">
                            Manage users, notices, markings, and categories efficiently. Use the links below to navigate to the respective management pages. The statistics section provides an overview of the total counts for users, notices, comments, and categories. Keep track of your administrative tasks and ensure smooth operations.
                        </p>
                    </div>
                </div>
                <div class="p-6 text-gray-900 grid grid-cols-2 gap-6">

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Management</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('admin.users') }}" class="bg-blue-600 hover:bg-blue-800 duration-300 text-white p-4 rounded-lg shadow block">
                                <h4 class="text-sm font-semibold text-gray-100">Users</h4>
                                <p class="mt-1 text-2xl font-bold">Manage Users</p>
                            </a>
                            <a href="{{ route('notices.index') }}" class="bg-blue-600 hover:bg-blue-800 duration-300 text-white p-4 rounded-lg shadow block">
                                <h4 class="text-sm font-semibold text-gray-100">Notices</h4>
                                <p class="mt-1 text-2xl font-bold">Manage Notices</p>
                            </a>
                            <a href="{{ route('markings.index') }}" class="bg-blue-600 hover:bg-blue-800 duration-300 text-white p-4 rounded-lg shadow block">
                                <h4 class="text-sm font-semibold text-gray-100">Markings</h4>
                                <p class="mt-1 text-2xl font-bold">Manage Markings</p>
                            </a>
                            <a href="{{ route('categories.index') }}" class="bg-blue-600 hover:bg-blue-800 duration-300 text-white p-4 rounded-lg shadow block">
                                <h4 class="text-sm font-semibold text-gray-100">Categories</h4>
                                <p class="mt-1 text-2xl font-bold">Manage Categories</p>
                            </a>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Statistics</h3>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h4 class="text-sm font-semibold text-gray-600">Total Users</h4>
                                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h4 class="text-sm font-semibold text-gray-600">Total Notices</h4>
                                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $totalNotices }}</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h4 class="text-sm font-semibold text-gray-600">Total Comments</h4>
                                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $totalComments }}</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h4 class="text-sm font-semibold text-gray-600">Total Categories</h4>
                                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
