<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Company Signup - You'reHired</title>
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
                    <h1 class="text-3xl font-bold text-slate-900 mb-2">Create Company Account</h1>
                    <p class="text-slate-600">Start your recruitment journey with us</p>
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
                                <a href="{{ route('jobseeker.register.form') }}" class="font-medium text-blue-600 hover:text-blue-800 underline ml-1">
                                    Switch to Job Seeker Registration
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Company Signup Card -->
                <div class="auth-card" x-data="{ password: '', passwordStrength: 0 }">
                    <form method="POST" action="{{ route('company.register') }}" class="space-y-5">
                        @csrf

                        <!-- Company Name -->
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-slate-700 mb-2">
                                Company Name
                            </label>
                            <input 
                                type="text" 
                                id="company_name" 
                                name="company_name"
                                value="{{ old('company_name') }}"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('company_name') border-red-500 @enderror"
                                placeholder="Acme Corporation"
                                required
                                autofocus
                            >
                            @error('company_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Subdomain -->
                        <div>
                            <label for="subdomain" class="block text-sm font-medium text-slate-700 mb-2">
                                Subdomain
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="subdomain" 
                                    name="subdomain"
                                    value="{{ old('subdomain') }}"
                                    class="w-full px-4 py-3 pl-12 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('subdomain') border-red-500 @enderror"
                                    placeholder="your-company"
                                    required
                                >
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                    https://
                                </span>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500">
                                    .yourseekers.com
                                </span>
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Your unique company portal URL</p>
                            @error('subdomain')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                                Company Email
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('email') border-red-500 @enderror"
                                placeholder="contact@company.com"
                                required
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">
                                Phone Number (Optional)
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone"
                                value="{{ old('phone') }}"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('phone') border-red-500 @enderror"
                                placeholder="+1 (555) 123-4567"
                            >
                            @error('phone')
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
                                x-model="password"
                                @input="passwordStrength = Math.min(4, Math.floor(password.length / 3))"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300 @error('password') border-red-500 @enderror"
                                placeholder="••••••••"
                                required
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <!-- Password Strength Meter -->
                            <div class="mt-3 grid grid-cols-4 gap-2">
                                <div class="strength-segment" :class="{ 'active': passwordStrength >= 1 }"></div>
                                <div class="strength-segment" :class="{ 'active': passwordStrength >= 2 }"></div>
                                <div class="strength-segment" :class="{ 'active': passwordStrength >= 3 }"></div>
                                <div class="strength-segment" :class="{ 'active': passwordStrength >= 4 }"></div>
                            </div>
                            <p class="mt-1 text-xs text-slate-400">
                                <span x-show="passwordStrength === 0">Enter a password</span>
                                <span x-show="passwordStrength === 1">Weak password</span>
                                <span x-show="passwordStrength === 2">Fair password</span>
                                <span x-show="passwordStrength === 3">Good password</span>
                                <span x-show="passwordStrength === 4">Strong password</span>
                            </p>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                                Confirm Password
                            </label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation"
                                class="w-full px-4 py-3 text-slate-900 rounded-2xl border-2 border-slate-300 focus:input-teal-glow transition-all duration-300"
                                placeholder="••••••••"
                                required
                            >
                        </div>

                        <!-- Terms Agreement -->
                        <div class="flex items-start">
                            <input 
                                type="checkbox" 
                                id="terms" 
                                name="terms" 
                                required 
                                class="w-4 h-4 mt-1 rounded text-teal-500 focus:ring-teal-500"
                            >
                            <label for="terms" class="ml-2 text-sm text-slate-600">
                                I agree to the <a href="#" class="font-medium text-teal-500 hover:text-teal-600 hover:underline">Terms of Service</a> and <a href="#" class="font-medium text-teal-500 hover:text-teal-600 hover:underline">Privacy Policy</a>
                            </label>
                        </div>
                        @error('terms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <!-- Create Account Button -->
                        <button type="submit" class="btn-electric-blue w-full">
                            Create Company Account
                        </button>
                    </form>

                    <!-- Login link -->
                    <div class="mt-6 text-center">
                        <span class="text-sm text-slate-500">Already have an account?</span>
                        <a href="{{ route('company.login.form') }}" class="text-sm font-medium text-teal-500 ml-1 hover:text-teal-600 hover:underline">
                            Log in
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

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
