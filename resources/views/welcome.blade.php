<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    @include('layouts.navigation')

    <main class="container mx-auto mt-8 p-4">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Welcome to the Notice Board</h1>
            <p class="text-lg text-gray-600 mb-6">Stay updated with the latest news and notices here.</p>

            @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-md shadow-md transition duration-300">
                    Go to Dashboard
                </a>
            @endauth
        </div>
    </main>

    <section class="container mx-auto mt-8 p-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Recent Notices</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @php
                $notices = \App\Models\Notice::latest()->get();
            @endphp
            @foreach ($notices->take(3) as $notice)
                @php
                    $colors = [
                        'bg-yellow-100',
                        'bg-pink-100',
                        'bg-green-100',
                        'bg-blue-100',
                        'bg-purple-100',
                        'bg-orange-100',
                    ];

                    $id = $notice->notice_id;
                    mt_srand($id);
                    $color = $colors[mt_rand(0, count($colors) - 1)];
                @endphp

                <div class="{{ $color }} p-6 shadow-lg rounded-lg flex flex-col justify-between">
                    <div>
                        <a href="{{ route('notices.show', $notice->notice_id) }}">
                            <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $notice->title }}</h5>
                        </a>
                        <p class="mb-4 text-base text-gray-700">{{ Str::limit($notice->description, 120) }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        {{-- @auth --}}
                        <a href="{{ route('notices.show', $notice->notice_id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        {{-- @else
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login to Read More
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    @endauth --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</body>

</html>
