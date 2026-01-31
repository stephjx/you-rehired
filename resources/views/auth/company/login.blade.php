<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Company Login - You'reHired</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .brand-animation {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
            }
            .feature-icon {
                transition: all 0.3s ease;
            }
            .feature-item:hover .feature-icon {
                transform: scale(1.1);
            }
        </style>
    </head>
    <body class="antialiased font-sans bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50 min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center space-x-3 justify-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="text-3xl font-bold text-slate-900 tracking-tight">You'reHired</span>
                </a>
                <h1 class="text-3xl font-bold text-slate-900 mb-2">Company Portal Login</h1>
                <p class="text-slate-600">Access your recruitment dashboard</p>
            </div>

                    
            <!-- Role Switch Notice -->
            <div class="mb-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm text-blue-700">
                            <span class="font-medium">Looking for job opportunities instead?</span>
                            <a href="{{ route('jobseeker.login.form') }}" class="font-medium text-blue-600 hover:text-blue-800 underline ml-1">
                                Switch to Job Seeker Portal
                            </a>
                        </p>
                    </div>
                </div>
            </div>
                    
            <!-- Login Form -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-200">
                <form method="POST" action="{{ route('company.login') }}" class="space-y-6">
                    @csrf

                    <!-- Subdomain -->
                    <div>
                        <label for="subdomain" class="block text-sm font-medium text-slate-700 mb-2">
                            Company Subdomain
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="subdomain" 
                                name="subdomain"
                                value="{{ old('subdomain') }}"
                                class="w-full px-4 py-3 pl-12 text-slate-900 rounded-xl border-2 border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 @error('subdomain') border-red-500 @enderror"
                                placeholder="your-company"
                                required
                                autofocus
                            >
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                https://
                            </span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500">
                                .yourseekers.com
                            </span>
                        </div>
                        @error('subdomain')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                            class="w-full px-4 py-3 text-slate-900 rounded-xl border-2 border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 @error('email') border-red-500 @enderror"
                            placeholder="you@company.com"
                            required
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
                            class="w-full px-4 py-3 text-slate-900 rounded-xl border-2 border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 @error('password') border-red-500 @enderror"
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
                                class="w-4 h-4 rounded text-blue-500 focus:ring-blue-500 border-slate-300"
                            >
                            <label for="remember" class="ml-2 text-sm text-slate-600">
                                Remember me
                            </label>
                        </div>
                        
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-500 hover:text-blue-600 hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow hover:shadow-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
                        Log in to Dashboard
                    </button>
                </form>

                <!-- Sign up link -->
                <div class="mt-6 text-center pt-6 border-t border-slate-200">
                    <span class="text-sm text-slate-500">Don't have an account?</span>
                    <a href="{{ route('company.register.form') }}" class="text-sm font-medium text-blue-500 ml-1 hover:text-blue-600 hover:underline">
                        Create account
                    </a>
                </div>
            </div>
            
            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-slate-700 transition-colors inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to home
                </a>
            </div>
        </div>
    </body>
</html>
