<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - You'reHired</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-900">You'reHired Admin</h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 text-sm font-medium text-gray-900 bg-gray-100">
                    Dashboard
                </a>
                <a href="#" class="block px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Users
                </a>
                <a href="#" class="block px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Companies
                </a>
                <a href="#" class="block px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Job Seekers
                </a>
                <a href="#" class="block px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="px-6 py-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Admin Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}!</span>
                        <a href="{{ route('dashboard') }}" class="text-sm text-teal-600 hover:text-teal-800">Back to User Dashboard</a>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Total Users</h3>
                        <p class="text-3xl font-bold text-teal-600 mt-2">1,243</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Active Companies</h3>
                        <p class="text-3xl font-bold text-blue-600 mt-2">89</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-medium text-gray-900">Job Seekers</h3>
                        <p class="text-3xl font-bold text-purple-600 mt-2">1,154</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Activity</h3>
                    <p class="text-gray-600">Admin dashboard content coming soon...</p>
                </div>
            </main>
        </div>
    </div>
</body>
</html>