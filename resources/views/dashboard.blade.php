@php use App\Models\Notice; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Welcome, <strong>{{ Auth::user()->name }}</strong></h2>
                    <p>This is your dashboard, from here you can modify your profile, post notices, and view the latest news</p>

                    {{-- Post notice href --}}
                    <a href="{{ route('notices.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Post Notice</a>

                    {{-- Notices --}}
                    <a href="{{ route('notices.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">View Notices</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
