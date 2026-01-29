<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - You'reHired</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50">
        <div class="min-h-screen flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <!-- Logo/Brand -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-900">You'reHired</span>
                    </a>
                    <h1 class="text-3xl font-bold text-slate-900 mb-2">Welcome Back</h1>
                    <p class="text-slate-600">Select your account type to log in</p>
                </div>

                <!-- Authentication Type Selection Card -->
                <div class="auth-card">
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Company Login -->
                        <a href="{{ route('company.login.form') }}" class="flex items-center p-5 bg-white rounded-2xl border-2 border-slate-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 text-left">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Company Account</h3>
                                <p class="text-sm text-slate-600 mt-1">Log in to your company portal</p>
                            </div>
                        </a>

                        <!-- Job Seeker Login -->
                        <a href="{{ route('jobseeker.login.form') }}" class="flex items-center p-5 bg-white rounded-2xl border-2 border-slate-200 hover:border-teal-300 hover:shadow-md transition-all duration-300 text-left">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-green-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Job Seeker Account</h3>
                                <p class="text-sm text-slate-600 mt-1">Access your job applications</p>
                            </div>
                        </a>
                    </div>

                    <div class="mt-6 pt-6 border-t border-slate-200">
                        <div class="text-center">
                            <span class="text-sm text-slate-500">Don't have an account?</span>
                            <div class="mt-3 space-y-3">
                                <a href="{{ route('company.register.form') }}" class="block w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow hover:shadow-lg transition-all duration-300">
                                    Create Company Account
                                </a>
                                <a href="{{ route('jobseeker.register.form') }}" class="block w-full px-6 py-3 bg-gradient-to-r from-teal-500 to-green-600 text-white font-semibold rounded-xl shadow hover:shadow-lg transition-all duration-300">
                                    Create Job Seeker Account
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back to home -->
                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-slate-700">
                        ← Back to home
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
