<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('markings.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name <span class="text-red-500">*</span></label>
                            <input type="text" required name="name" id="name" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description <span class="text-red-500">*</span></label>
                            <textarea name="description" required id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        {{-- Looks kinda ugly, maybe restyle later --}}
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                            <input type="color" name="color" id="color" value="#4f46e5" class="shadow appearance-none border rounded h-14 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-700 font-bold">This marking will:</p>
                            <div class="flex items-center">
                                <input type="checkbox" name="disable_comments" id="disable_comments" class="mr-2">
                                <label for="disable_comments" class="text-gray-700 text-sm font-bold">Disable Comments</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="hide_notice" id="hide_notice" class="mr-2">
                                <label for="hide_notice" class="text-gray-700 text-sm font-bold">Hide Notice</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
