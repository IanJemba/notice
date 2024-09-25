<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 shadow-md text-gray-900">
                    <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Welcome, <strong>{{ Auth::user()->name }}</strong>!</h2>
                    <p class="text-gray-700 leading-relaxed">
                        This is your dashboard. From here, you can modify your profile, post notices, and stay updated with the latest news.
                    </p>
                    <ul class="flex flex-col sm:flex-row">
                        <li><a class="bg-indigo-600 hover:bg-indigo-700 text-white sm:rounded-lg m-2 p-3 block transition duration-300 ease-in-out shadow hover:shadow-lg" href="{{ route('notices.create') }}">Create a Notice</a></li>
                        <li><a class="bg-indigo-600 hover:bg-indigo-700 text-white sm:rounded-lg m-2 p-3 block transition duration-300 ease-in-out shadow hover:shadow-lg" href="{{ route('notices.index') }}">Look at Notices</a></li>
                    </ul>
                </div>

                <div class="p-6 shadow-md text-gray-900">
                    <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Rules of the Notice Board</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    </ul>
                </div>
                <div class="p-6 shadow-md text-gray-900">
                    <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Recent Post</h2>

                    @if ($latestNotice)
                        <div class="bg-blue-100 p-6 shadow-lg rounded-lg">
                            <a href="{{ route('notices.show', $latestNotice->notice_id) }}">
                                <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $latestNotice->title }}</h5>
                            </a>
                            <p class="mb-4 text-base text-gray-700">{{ Str::limit($latestNotice->description, 120) }}</p>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('notices.show', $latestNotice->notice_id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-700">No recent posts available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
