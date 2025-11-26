@extends('layouts.app')

@section('content')
<div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-12">

        {{-- HEADER: Search + Add New User --}}
        <div class="flex items-center justify-between">
            {{-- Search Bar --}}
            <form method="GET" class="flex items-center w-full max-w-xs">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-3 py-2 text-sm"
                    placeholder="Search users..."
                >
            </form>

            {{-- Add New Button --}}
            <a href="{{ route('users.create') }}" 
               class="rounded-lg bg-blue-600 px-4 py-2 text-white text-sm font-medium hover:bg-blue-700">
                + Add New User
            </a>
        </div>


        {{-- USERS TABLE --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="w-full min-w-[700px]">
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th class="px-5 py-3 text-left sm:px-6">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">User</p>
                            </th>
                            <th class="px-5 py-3 text-left sm:px-6">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Email</p>
                            </th>
                            <th class="px-5 py-3 text-left sm:px-6">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Created At</p>
                            </th>
                            <th class="px-5 py-3 sm:px-6 text-right">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Actions</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b border-gray-100 dark:border-gray-800">

                                {{-- USER IMAGE + NAME --}}
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 overflow-hidden rounded-full">
                                            <img src="{{ $user->image ?? '/images/default-user.png' }}" alt="{{ $user->name }}">
                                        </div>
                                        <div>
                                            <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                {{ $user->name }}
                                            </span>
                                            <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                                                {{ $user->role ?? 'User' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                {{-- EMAIL --}}
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                        {{ $user->email }}
                                    </p>
                                </td>

                                {{-- CREATED DATE --}}
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                        {{ $user->created_at->format('d M, Y') }}
                                    </p>
                                </td>

                                {{-- ACTIONS DROPDOWN --}}
                                <td class="px-5 py-4 sm:px-6 text-right">
                                    <div class="relativ e inline-block text-left" x-data="{ open: false }">
                                        <button @click="open = !open" class="px-2 py-1 rounded border hover:bg-gray-100 dark:hover:bg-gray-800">
                                            ⋮
                                        </button>

                                        <div 
                                            x-show="open" 
                                            @click.away="open = false"
                                            class="absolute right-0 mt-2 w-32 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg z-50"
                                        >
                                            <a href="{{ route('users.edit', $user->id) }}" 
                                               class="block px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-800">
                                                Edit
                                            </a>

                                            
                                                <button type="submit" 
                                                        class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">
                                                    Delete
                                                </button>
                                             
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
