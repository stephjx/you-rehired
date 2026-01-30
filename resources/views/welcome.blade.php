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
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Override default anchor link behavior for smooth wavy scrolling
                const links = document.querySelectorAll('a[href^="#"]');
                
                links.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        if (href === '#') return;
                        
                        const target = document.querySelector(href);
                        if (target) {
                            e.preventDefault();
                            
                            // Get target position
                            const targetPosition = target.offsetTop - 80; // Account for fixed header
                            const startPosition = window.pageYOffset;
                            const distance = targetPosition - startPosition;
                            const duration = 1500; // ms
                            let start = null;
                            
                            // Easing function for wavy effect
                            const easeInOutQuad = (t, b, c, d) => {
                                t /= d / 2;
                                if (t < 1) return c / 2 * t * t + b;
                                t--;
                                return -c / 2 * (t * (t - 2) - 1) + b;
                            };
                            
                            // Animation function with wavy effect
                            const animateScroll = (currentTime) => {
                                if (start === null) start = currentTime;
                                const timeElapsed = currentTime - start;
                                const run = easeInOutQuad(timeElapsed, startPosition, distance, duration);
                                
                                // Add wavy effect by calculating a sine wave offset
                                const progress = timeElapsed / duration;
                                const waveAmplitude = Math.min(30, Math.abs(distance) * 0.05); // Wave height based on distance
                                const waveFrequency = 5; // Number of waves
                                const waveOffset = Math.sin(progress * Math.PI * waveFrequency) * waveAmplitude * Math.sin(progress * Math.PI);
                                
                                window.scrollTo(0, run + waveOffset);
                                
                                if (timeElapsed < duration) {
                                    requestAnimationFrame(animateScroll);
                                } else {
                                    // Ensure we land exactly on the target
                                    window.scrollTo(0, targetPosition);
                                }
                            };
                            
                            requestAnimationFrame(animateScroll);
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="antialiased font-sans bg-gray-50">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50/90 backdrop-blur-sm border-b border-slate-200 px-6 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 tracking-tight">You'reHired</span>
                </div>
                
                <div class="flex items-center space-x-6">
                    <a href="{{ route('auth.role.selector') }}" class="text-slate-700 hover:text-slate-900 font-medium transition-colors duration-200 text-lg">
                        Log in
                    </a>
                    <a href="#features" class="text-slate-700 hover:text-slate-900 font-medium transition-colors duration-200 text-lg">
                        About
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('company.register.form') }}" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-6 py-3 rounded-xl text-base font-medium hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                            Sign Up
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="min-h-screen flex items-center justify-center px-4 py-2 bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50">
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Text Content -->
                    <div class="text-center lg:text-left space-y-6">
                        <div class="inline-flex items-center px-6 py-4 bg-white/80 backdrop-blur-sm rounded-full border-2 border-slate-200 shadow-lg">
                            <span class="w-3 h-3 bg-teal-500 rounded-full mr-3 animate-pulse"></span>
                            <span class="text-base font-semibold text-slate-700">Trusted by 100+ companies worldwide</span>
                        </div>

                        <div>
                            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-slate-900 leading-tight tracking-tight mb-6">
                                Find Your Next
                                <span class="bg-gradient-to-r from-teal-500 to-blue-600 bg-clip-text text-transparent">
                                    Perfect Hire
                                </span>
                            </h1>
                            <p class="text-xl text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                                The all-in-one recruitment platform that connects top talent with innovative companies.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start">
                            <a href="{{ route('company.register.form') }}" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-10 py-5 rounded-2xl font-bold hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 inline-flex items-center justify-center text-lg">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Get Started
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-5 pt-2 max-w-2xl mx-auto lg:mx-0">
                            <div class="text-center lg:text-left">
                                <div class="text-2xl font-bold text-slate-900">500+</div>
                                <div class="text-sm text-slate-500 uppercase tracking-wider mt-1 font-medium">Active Jobs</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-2xl font-bold text-slate-900">10k+</div>
                                <div class="text-sm text-slate-500 uppercase tracking-wider mt-1 font-medium">Candidates</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-2xl font-bold text-slate-900">95%</div>
                                <div class="text-sm text-slate-500 uppercase tracking-wider mt-1 font-medium">Success Rate</div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Content -->
                    <div class="relative flex justify-center">
                        <div class="relative w-full max-w-lg animate-float">
                            <!-- Main Image Container with Enhanced Gradient Background -->
                            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-8 border-white bg-gradient-to-br from-teal-100 via-blue-50 to-teal-50">
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                     alt="Professional team collaboration" 
                                     class="w-full h-96 object-cover">
                                
                                <!-- Floating Elements -->
                                <div class="absolute -top-6 -right-6 w-28 h-28 bg-gradient-to-br from-teal-400 to-blue-500 rounded-2xl shadow-2xl flex items-center justify-center animate-float">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                
                                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-gradient-to-br from-blue-400 to-teal-500 rounded-xl shadow-2xl flex items-center justify-center animate-float delay-1000">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Decorative Elements -->
                            <div class="absolute -bottom-8 -right-8 w-20 h-20 bg-white rounded-2xl shadow-xl flex items-center justify-center border-2 border-slate-200 animate-float delay-500">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-teal-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <div id="features" class="py-20 px-4 bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                        Everything You Need to Hire Better
                    </h2>
                    <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                        Powerful features designed to streamline your recruitment process
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-3xl p-8 border-2 border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300 group">
                        <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 text-center">Multi-Tenant Platform</h3>
                        <p class="text-slate-600 text-center leading-relaxed">
                            Dedicated workspaces for each company with complete data isolation and custom branding.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white rounded-3xl p-8 border-2 border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300 group">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 text-center">Enterprise Security</h3>
                        <p class="text-slate-600 text-center leading-relaxed">
                            Bank-level security with 2FA authentication, role-based access control, and encrypted data.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white rounded-3xl p-8 border-2 border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300 group">
                        <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 text-center">Lightning Fast</h3>
                        <p class="text-slate-600 text-center leading-relaxed">
                            Built with Laravel and Livewire for real-time updates and blazing-fast performance.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-white rounded-3xl p-8 border-2 border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300 group">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 text-center">Analytics Dashboard</h3>
                        <p class="text-slate-600 text-center leading-relaxed">
                            Comprehensive insights and reports to track hiring metrics and optimize your process.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50 border-t border-slate-200 py-12 px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-900">You'reHired</span>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-slate-600 text-base">
                            © 2026 You'reHired. All rights reserved.
                        </p>
                        <p class="text-slate-500 text-sm mt-1">
                            Built with Laravel and modern web technologies.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>