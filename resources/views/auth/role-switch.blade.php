@extends('layouts.auth')

@section('title', 'Switch Role')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Switch Your Role
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Select a role to switch to
            </p>
        </div>

        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There were errors with your submission
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form class="space-y-6" action="{{ route('role.switch') }}" method="POST">
                @csrf
                
                <div>
                    <label for="role_id" class="block text-sm font-medium text-gray-700">
                        Available Roles
                    </label>
                    <div class="mt-1 space-y-3">
                        @forelse($availableRoles as $role)
                            <div class="flex items-center">
                                <input id="role_{{ $role->id }}" name="role_id" type="radio" 
                                       value="{{ $role->id }}" 
                                       class="focus:ring-teal-500 h-4 w-4 text-teal-600 border-gray-300"
                                       {{ session('active_role') == $role->id ? 'checked' : '' }}>
                                <label for="role_{{ $role->id }}" class="ml-3 block text-sm font-medium text-gray-700">
                                    <span class="font-semibold">{{ $role->name }}</span>
                                    @if($role->description)
                                        <span class="block text-xs text-gray-500 mt-1">{{ $role->description }}</span>
                                    @endif
                                </label>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">You don't have any roles assigned.</p>
                        @endforelse
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-teal-500 to-blue-600 hover:from-teal-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-200">
                        Switch Role
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}" 
                   class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-200">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection