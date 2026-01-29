<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>You'reHired - Welcome</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
                100% { transform: translateY(0px); }
            }
            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
            .delay-500 {
                animation-delay: 0.5s;
            }
            .delay-1000 {
                animation-delay: 1s;
            }
        </style>
    </head>
    <body class="antialiased font-sans bg-gray-50">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-sm border-b border-gray-200 px-6 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900 tracking-tight">You'reHired</span>
                </div>
                
                <div class="flex items-center space-x-6">
                    <a href="{{ route('auth.role.selector') }}" class="text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200">
                        Log in
                    </a>
                    <a href="#features" class="text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200">
                        About
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('company.register.form') }}" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                            Sign Up
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="min-h-screen flex items-center justify-center px-4 py-16 bg-gradient-to-b from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Text Content -->
                    <div class="text-center lg:text-left space-y-10">
                        <div class="inline-flex items-center px-4 py-2 bg-white/70 backdrop-blur-sm rounded-full border border-gray-200 shadow-sm">
                            <span class="w-2 h-2 bg-teal-500 rounded-full mr-2"></span>
                            <span class="text-sm font-medium text-gray-700">Trusted by 100+ companies worldwide</span>
                        </div>

                        <div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight tracking-tight mb-6">
                                Find Your Next
                                <span class="bg-gradient-to-r from-teal-500 to-blue-600 bg-clip-text text-transparent">
                                    Perfect Hire
                                </span>
                            </h1>
                            <p class="text-lg text-gray-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                                The all-in-one recruitment platform that connects top talent with innovative companies.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="{{ route('company.register.form') }}" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-8 py-4 rounded-xl font-medium hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 inline-flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Get Started
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-8 pt-10 max-w-2xl mx-auto lg:mx-0">
                            <div class="text-center lg:text-left">
                                <div class="text-3xl font-bold text-gray-900">500+</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Active Jobs</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-3xl font-bold text-gray-900">10k+</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Candidates</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-3xl font-bold text-gray-900">95%</div>
                                <div class="text-xs text-gray-500 uppercase tracking-wider mt-1">Success Rate</div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Content -->
                    <div class="relative flex justify-center">
                        <div class="relative w-full max-w-lg animate-float">
                            <!-- Main Image Container with Gradient Background -->
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border-8 border-white bg-gradient-to-br from-teal-50 to-blue-100">
<img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"                                     alt="Professional team collaboration" 
                                     class="w-full h-96 object-cover">
                                
                                <!-- Floating Elements -->
                                <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-teal-400 to-blue-500 rounded-xl shadow-lg flex items-center justify-center animate-float">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                
                                <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-gradient-to-br from-blue-400 to-teal-500 rounded-lg shadow-lg flex items-center justify-center animate-float delay-1000">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Decorative Elements -->
                            <div class="absolute -bottom-6 -right-6 w-16 h-16 bg-white rounded-full shadow-lg flex items-center justify-center border-2 border-gray-100 animate-float delay-500">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-teal-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div id="features" class="py-20 px-4 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">
                        Everything You Need to Hire Better
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Powerful features designed to streamline your recruitment process
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="group p-6 bg-gray-50 rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-lg hover:border-gray-200">
                        <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Multi-Tenant Platform</h3>
                        <p class="text-gray-600">Dedicated workspaces for each company with complete data isolation and custom branding.</p>
                    </div>

                    <div class="group p-6 bg-gray-50 rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-lg hover:border-gray-200">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Enterprise Security</h3>
                        <p class="text-gray-600">Bank-level security with 2FA authentication, role-based access control, and encrypted data.</p>
                    </div>

                    <div class="group p-6 bg-gray-50 rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-lg hover:border-gray-200">
                        <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Lightning Fast</h3>
                        <p class="text-gray-600">Built with Laravel and Livewire for real-time updates and blazing-fast performance.</p>
                    </div>

                    <div class="group p-6 bg-gray-50 rounded-2xl border border-gray-100 transition-all duration-300 hover:shadow-lg hover:border-gray-200">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Analytics Dashboard</h3>
                        <p class="text-gray-600">Comprehensive insights and reports to track hiring metrics and optimize your process.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-50 border-t border-gray-100 py-12 px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">You'reHired</span>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-gray-600 text-sm">
                            © 2026 You'reHired. All rights reserved.
                        </p>
                        <p class="text-gray-500 text-xs mt-1">
                            Built with Laravel and modern web technologies.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>