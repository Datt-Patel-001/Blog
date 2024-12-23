<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-4 pl-4">
                    <a href="#" class="text-blue-500 hover:underline">Add</a>
                </div>
                <div class="pb-4 pl-4 pr-4 text-gray-900">
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-600">
                                        ID
                                    </th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-600">
                                        Title
                                    </th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-600">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                 @isset($permissions)
                                    @foreach($permissions as $permission)
                                        <tr class="hover:bg-gray-50">
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $permission->id }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $permission->title }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                <a href="#" class="text-blue-500 hover:underline">Edit</a>
                                                <span class="mx-1">|</span>
                                                <a href="#" class="text-red-500 hover:underline">Delete</a>
                                                <span class="mx-1">|</span>
                                                <a href="#" class="text-green-500 hover:underline">view</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                <!-- Repeat rows for other users -->
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
