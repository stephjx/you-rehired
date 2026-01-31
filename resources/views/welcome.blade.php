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
            .animate-float { animation: float 3s ease-in-out infinite; }
            .delay-500 { animation-delay: 0.5s; }
            .delay-1000 { animation-delay: 1s; }

            /* Fade In */
            .hero-fade {
                animation: fadeUp 1s ease forwards;
                opacity: 0;
            }
            @keyframes fadeUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            /* Glow Float */
            .hero-glow { animation: glowFloat 6s ease-in-out infinite; }
            @keyframes glowFloat {
                0%,100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            /* Button Ripple */
            .interactive-btn::after {
                content: "";
                position: absolute;
                width: 0;
                height: 0;
                background: rgba(255,255,255,0.3);
                border-radius: 50%;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                transition: width 0.5s, height 0.5s;
            }
            .interactive-btn:hover::after {
                width: 300px;
                height: 300px;
            }

            /* 3D */
            .perspective { perspective: 1200px; }

            .hero-image-card {
                transform-style: preserve-3d;
                transition: transform 0.2s ease;
            }

            .hero-image-card:hover img { transform: scale(1.05); }

            .hero-image { transition: transform 0.4s ease; }

            .cursor-light {
                position: absolute;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(255,255,255,0.35), transparent 60%);
                pointer-events: none;
                mix-blend-mode: overlay;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .hero-image-card:hover .cursor-light { opacity: 1; }
                    
            /* Page Section Transitions */
            .section {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }
            
            .section.visible {
                opacity: 1;
                transform: translateY(0);
            }
            
            .features-grid {
                opacity: 0;
                transform: translateY(40px);
                transition: opacity 1s ease-out, transform 1s ease-out;
            }
            
            .features-grid.visible {
                opacity: 1;
                transform: translateY(0);
            }
            
            /* Smooth Scroll Behavior */
            html {
                scroll-behavior: smooth;
            }
            
            /* Scroll Animation Keyframes */
            @keyframes scrollToSection {
                0% { 
                    transform: translateY(0) scale(1);
                }
                50% { 
                    transform: translateY(-10px) scale(1.02);
                }
                100% { 
                    transform: translateY(0) scale(1);
                }
            }
            
            .scroll-animate {
                animation: scrollToSection 0.8s ease-out;
            }
        </style>
        
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
                    </a>@if (Route::has('register'))
                        <a href="{{ route('company.register.form') }}" class="bg-gradient-to-r from-teal-500 to-blue-600 text-white px-6 py-3 rounded-xl text-base font-medium hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                            Sign Up
                        </a>
                    @endif
                </div>
            </div>
        </nav>

<!-- Interactive Hero Section -->
<section class="section hero-section">
    <div class="max-w-7xl mx-auto px-6 py-20 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT CONTENT -->
            <div class="space-y-8 text-center lg:text-left hero-fade">
                
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-teal-50 border border-teal-100 rounded-full">
                    <span class="w-2 h-2 bg-teal-500 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-sm font-semibold text-teal-700">
                        Trusted by 100+ companies
                    </span>
                </div>

                <!-- Headline -->
                <div class="space-y-6">
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Find Your Next
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-blue-600">
                            Perfect Hire
                        </span>
                    </h1>

                    <p class="text-xl text-gray-600 max-w-xl">
                        You'reHired helps companies connect with top talent faster using smart recruitment tools and analytics.
                    </p>
                </div>

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">

                    <a href="{{ route('company.register.form') }}"
                       class="interactive-btn relative overflow-hidden bg-gradient-to-r from-teal-500 to-blue-600 text-white px-8 py-4 rounded-xl font-semibold transition duration-300">
                        Get Started Free
                    </a>

                    <a href="#features"
                       id="learn-more-btn"
                       class="px-8 py-4 rounded-xl font-semibold border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-300 relative overflow-hidden group">
                        <span class="relative z-10">Learn More</span>
                        <span class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></span>
                    </a>

                </div>

<!-- Stats -->
<div class="flex justify-center lg:justify-start pt-10">

    <div class="flex flex-row flex-wrap gap-16">

        <!-- Stat 1 -->
        <div class="flex flex-col items-center lg:items-start">
            <span class="text-3xl font-bold text-gray-900">500+</span>
            <span class="text-sm text-gray-500 mt-2">Active Jobs</span>
        </div>

        <!-- Stat 2 -->
        <div class="flex flex-col items-center lg:items-start">
            <span class="text-3xl font-bold text-gray-900">10K+</span>
            <span class="text-sm text-gray-500 mt-2">Candidates</span>
        </div>

        <!-- Stat 3 -->
        <div class="flex flex-col items-center lg:items-start">
            <span class="text-3xl font-bold text-gray-900">95%</span>
            <span class="text-sm text-gray-500 mt-2">Success Rate</span>
        </div>

    </div>

</div>

            </div>

<!-- RIGHT IMAGE INTERACTIVE -->
<div class="relative hero-image-wrapper perspective">

    <!-- Glow Background -->
    <div class="hero-glow absolute inset-0 bg-gradient-to-tr from-teal-200 to-blue-200 blur-3xl opacity-30 rounded-full"></div>

    <!-- Interactive Card -->
    <div class="hero-image-card relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100">

        <!-- Cursor Light -->
        <div class="cursor-light"></div>

        <img 
            src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=2070&q=80"
            class="hero-image w-full h-[500px] object-cover"
        >
    </div>

</div>


            </div>
            </div>
        </section>
    <!-- Features Section -->
    <section class="section features-section" id="features">
<div class="py-20 px-4 bg-gradient-to-br from-slate-50 via-blue-50 to-teal-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-4 tracking-tight">
                Everything You Need to Hire Better
            </h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Powerful features designed to streamline your recruitment process
            </p>
        </div>

        <div class="features-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
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
</section>

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

            <script>
            document.addEventListener("DOMContentLoaded", function(){

                /* HERO IMAGE TILT */
                const image = document.querySelector(".hero-image");

                document.addEventListener("mousemove", e => {
                    if(!image) return;

                    let x = (window.innerWidth / 2 - e.pageX) / 40;
                    let y = (window.innerHeight / 2 - e.pageY) / 40;

                    image.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`;
                });


                /* CARD 3D + LIGHT */
                const card = document.querySelector(".hero-image-card");
                const light = document.querySelector(".cursor-light");

                if(card){
                    card.addEventListener("mousemove", e => {

                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;

                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;

                        const rotateX = (y - centerY) / 18;
                        const rotateY = (centerX - x) / 18;

                        card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;

                        if(light){
                            light.style.left = `${x - 100}px`;
                            light.style.top = `${y - 100}px`;
                        }
                    });

                    card.addEventListener("mouseleave", () => {
                        card.style.transform = "rotateX(0) rotateY(0)";
                    });
                }

            });
        </script>
        
        <script>
            // Smooth scroll with URL manipulation to hide hash
            document.addEventListener("DOMContentLoaded", function() {
                const learnMoreBtn = document.getElementById('learn-more-btn');
                const featuresSection = document.getElementById('features');
                
                if (learnMoreBtn && featuresSection) {
                    learnMoreBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Add animation class to button
                        this.classList.add('scroll-animate');
                        
                        // Remove animation class after animation completes
                        setTimeout(() => {
                            this.classList.remove('scroll-animate');
                        }, 800);
                        
                        // Scroll to features section with offset for navbar
                        const navbarHeight = document.querySelector('nav').offsetHeight;
                        const sectionPosition = featuresSection.offsetTop - navbarHeight - 20;
                        
                        // Smooth scroll to position
                        window.scrollTo({
                            top: sectionPosition,
                            behavior: 'smooth'
                        });
                        
                        // Use History API to manipulate URL without hash
                        if (window.history && window.history.pushState) {
                            // Push clean URL to history
                            window.history.pushState({}, '', '/');
                            
                            // Optional: Update browser title
                            document.title = "You'reHired - Features";
                            
                            // Restore original title after navigation
                            setTimeout(() => {
                                document.title = "You'reHired - Welcome";
                            }, 2000);
                        }
                        
                        // Add temporary highlight effect to features section
                        setTimeout(() => {
                            featuresSection.style.boxShadow = '0 0 0 3px rgba(20, 184, 166, 0.3)';
                            featuresSection.style.transition = 'box-shadow 0.5s ease';
                            
                            setTimeout(() => {
                                featuresSection.style.boxShadow = 'none';
                            }, 1500);
                        }, 800);
                    });
                }
                
                // Handle browser back/forward buttons
                window.addEventListener('popstate', function(event) {
                    // Restore original title when navigating back
                    document.title = "You'reHired - Welcome";
                });
            });
        </script>
            
        <script>
            // Section transition effect on scroll
            document.addEventListener("DOMContentLoaded", function() {
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: "0px 0px -50px 0px"
                };
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                        }
                    });
                }, observerOptions);
                
                // Observe sections with 'section' class
                document.querySelectorAll('.section').forEach(section => {
                    observer.observe(section);
                });
                
                // Also observe the features grid
                const featuresGrid = document.querySelector('.features-grid');
                if (featuresGrid) {
                    observer.observe(featuresGrid);
                }
            });
        </script>
    </body>
</html>
















