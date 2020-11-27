@extends('layouts.basic')

@section('content')
    <header>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-white">Age Test</span>
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700">Calculate</a>
                                <a href="/entries" class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900">Entries</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<main>
    <div x-data="homeData()" x-init="$watch('user.name', value => displayName = '👋 ' + value)" class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="p-6 text-left md:text-center lg:text-center">
            <p class="mx-auto-w-2xl text-2xl text-gray-500 lg:mx-auto">
                Some previous entries.
            </p>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Entries</h3>
            </div>
            <div class="border-t border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date of Birth
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date of Entry
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($entries as $entry)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $entry->name }}
                            </td><td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $entry->dob }}
                            </td><td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $entry->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
