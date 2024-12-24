<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Details') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6 ">
                <div class="pt-4 pb-4 ">
                    <a href="{{ route('admin.users.index') }}" class="text-blue-500 hover:underline">Back</a>
                </div>
                <table class="min-w-full border-collapse border border-gray-300">
                    <tbody>
                        @isset($user)
                        <tr class="bg-gray-100">
                            <td class="px-6 py-4 font-medium text-gray-600 border border-gray-300">User Name</td>
                            <td class="px-6 py-4 text-gray-800 border border-gray-300">{{ $user->user_name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-600 border border-gray-300">Email</td>
                            <td class="px-6 py-4 text-gray-800 border border-gray-300">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-600 border border-gray-300">First Name</td>
                            <td class="px-6 py-4 text-gray-800 border border-gray-300">{{ $user->first_name}}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-600 border border-gray-300">Last Name</td>
                            <td class="px-6 py-4 text-gray-800 border border-gray-300">{{ $user->last_name }}</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="px-6 py-4 font-medium text-gray-600 border border-gray-300">Roles</td>
                            <td class="px-6 py-4 text-gray-800 border border-gray-300">{{ $user->roles }}</td>
                        </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
