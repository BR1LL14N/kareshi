<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <title>Login - HeartRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        accent: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards',
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        .animate-on-load {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .animate-delay-200 {
            animation-delay: 0.2s;
        }
        
        .animate-delay-400 {
            animation-delay: 0.4s;
        }
        
        .animate-delay-600 {
            animation-delay: 0.6s;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .floating-shapes::before,
        .floating-shapes::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(147, 197, 253, 0.1));
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-shapes::before {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-shapes::after {
            width: 150px;
            height: 150px;
            bottom: 10%;
            right: 10%;
            animation-delay: 3s;
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes"></div>
    
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm border-b border-gray-100 sticky-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logoRent.png') }}" alt="HeartRent Logo" class="h-10 w-auto">
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-primary-500 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary-50 transition-all duration-200">
                        Sign Up
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-600 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-100">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-primary-600 hover:text-primary-700 font-medium">
                    <i class="fas fa-user-plus mr-2"></i>Sign Up
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center animate-on-load">
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-primary-500 to-purple-600 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                <p class="text-gray-600 text-lg">Sign in to your HeartRent account</p>
            </div>

            <!-- Login Form -->
            <div class="animate-on-load animate-delay-200">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <form class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    autocomplete="email" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="Enter your email address"
                                    value="{{ old('email') }}"
                                >
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    autocomplete="current-password" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-12 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="Enter your password"
                                >
                                <button 
                                    type="button" 
                                    id="toggle-password"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                >
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600 cursor-pointer" id="eye-icon"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    id="remember-me" 
                                    name="remember" 
                                    type="checkbox" 
                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded transition-colors"
                                >
                                <label for="remember-me" class="ml-2 block text-sm text-gray-700 font-medium">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="/forgot-password" class="text-primary-600 hover:text-primary-700 font-semibold transition-colors">
                                    Forgot password?
                                </a>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-lg text-white bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                            >
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-sign-in-alt text-primary-300 group-hover:text-primary-200"></i>
                                </span>
                                Sign In
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="grid grid-cols-2 gap-3">
                            <button 
                                type="button"
                                class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-all duration-200 hover:shadow-md"
                            >
                                <i class="fab fa-google text-red-500 text-lg"></i>
                                <span class="ml-2">Google</span>
                            </button>
                            
                            <button 
                                type="button"
                                class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-all duration-200 hover:shadow-md"
                            >
                                <i class="fab fa-facebook text-blue-600 text-lg"></i>
                                <span class="ml-2">Facebook</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sign Up Link -->
            <div class="text-center animate-on-load animate-delay-400">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                        Sign up here
                    </a>
                </p>
            </div>

            <!-- Features -->
            <div class="animate-on-load animate-delay-600">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-shield-alt text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Secure Login</p>
                    </div>
                    
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-users text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Trusted Platform</p>
                    </div>
                    
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Decorative Elements -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-gradient-to-r from-primary-200 to-purple-200 rounded-full opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-24 h-24 bg-gradient-to-r from-secondary-200 to-accent-200 rounded-full opacity-20 animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/3 w-16 h-16 bg-gradient-to-r from-accent-200 to-primary-200 rounded-full opacity-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Password visibility toggle
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input[required]');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('border-red-300');
                        this.classList.remove('border-gray-300');
                    } else {
                        this.classList.remove('border-red-300');
                        this.classList.add('border-gray-300');
                    }
                });
                
                input.addEventListener('focus', function() {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-primary-500');
                });
            });

            // Add loading state to submit button
            form.addEventListener('submit', function() {
                const submitButton = form.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                submitButton.innerHTML = `
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-spinner fa-spin text-primary-300"></i>
                    </span>
                    Signing In...
                `;
                submitButton.disabled = true;
                
                // Re-enable button after 3 seconds (in case of error)
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                }, 3000);
            });
        });

        // Add smooth animations on load
        window.addEventListener('load', function() {
            const animatedElements = document.querySelectorAll('.animate-on-load');
            animatedElements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>
