<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'School Notice Board') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center">
                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Cambridge_University_Press_logo.png"
                        alt="Logo" style="width: 100px; height: auto; margin-right: 20px;">
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">School Notice Board</h1>
                    <p class="text-gray-600">Stay updated with the latest notices, events, and announcements</p>
                </div>
            </div>
        </header>


        <main class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Notices Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Latest Notices</h2>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <ul class="space-y-4">
                            <li>
                                <h3 class="text-xl font-medium text-gray-900">Notice Title 1</h3>
                                <p class="text-gray-600">Notice content goes here. Make sure to highlight any important
                                    details.</p>
                            </li>
                            <li>
                                <h3 class="text-xl font-medium text-gray-900">Notice Title 2</h3>
                                <p class="text-gray-600">Another important notice content goes here.</p>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Events Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upcoming Events</h2>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <ul class="space-y-4">
                            <li>
                                <h3 class="text-xl font-medium text-gray-900">Event Name 1</h3>
                                <p class="text-gray-600">Event description and details here.</p>
                                <p class="text-gray-600">Date: <strong>January 25, 2024</strong></p>
                            </li>
                            <li>
                                <h3 class="text-xl font-medium text-gray-900">Event Name 2</h3>
                                <p class="text-gray-600">Description of another upcoming event here.</p>
                                <p class="text-gray-600">Date: <strong>February 10, 2024</strong></p>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Announcements Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Announcements</h2>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <p class="text-gray-600">No new announcements at this time. Stay tuned for updates!</p>
                    </div>
                </section>

                <!-- Contact Section -->
                <section class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Information</h2>
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                        <p class="text-gray-600">If you have any questions, please contact the school administration.
                        </p>
                        <p class="text-gray-600">Email: <a href="mailto:info@school.com"
                                class="text-blue-500 underline">info@school.com</a></p>
                        <p class="text-gray-600">Phone: (123) 456-7890</p>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

</html>
