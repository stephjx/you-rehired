<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Job Seeker Login - You'reHired</title>
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
                    <h1 class="text-3xl font-bold text-slate-900 mb-2">Job Seeker Portal</h1>
                    <p class="text-slate-600">Find your next opportunity</p>
                </div>

                <!-- Job Seeker Login Card -->
                <div class="auth-card">
                    <form method="POST" action="{{ route('jobseeker.login') }}" class="space-y-5">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('email') border-red-500 @enderror"
                                placeholder="john.doe@email.com"
                                required
                                autofocus
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                                Password
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('password') border-red-500 @enderror"
                                placeholder="••••••••"
                                required
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="remember" 
                                    name="remember"
                                    class="w-4 h-4 rounded text-teal-500 focus:ring-teal-500"
                                >
                                <label for="remember" class="ml-2 text-sm text-slate-600">
                                    Remember me
                                </label>
                            </div>
                            
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-teal-500 hover:text-teal-600 hover:underline">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn-electric-blue w-full">
                            Log in to Dashboard
                        </button>
                    </form>

                    <!-- Sign up link -->
                    <div class="mt-6 text-center">
                        <span class="text-sm text-slate-500">Don't have an account?</span>
                        <a href="{{ route('jobseeker.register.form') }}" class="text-sm font-medium text-teal-500 ml-1 hover:text-teal-600 hover:underline">
                            Create account
                        </a>
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
