<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('markings.update', $marking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ $marking->name }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea name="description" id="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $marking->description }}</textarea>
                        </div>
                        {{-- Looks kinda ugly, maybe restyle later --}}
                        <div class="mb-4">
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                            <input type="color" name="color" id="color" value="{{ $marking->color }}"
                                class="shadow appearance-none border rounded h-14 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-700 font-bold">This marking will:</p>
                            <div class="flex items-center">
                                <input type="checkbox" checked="{{ $marking->disable_comments }}" name="disable_comments" id="disable_comments" class="mr-2">
                                <label for="disable_comments" class="text-gray-700 text-sm font-bold">Disable Comments</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="checkbox" checked="{{ $marking->hide_notice }}" name="hide_notice" id="hide_notice" class="mr-2">
                                <label for="hide_notice" class="text-gray-700 text-sm font-bold">Hide Notice</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
