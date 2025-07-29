<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <title>Register - HeartRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        
        .animate-delay-800 {
            animation-delay: 0.8s;
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
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.1), rgba(134, 239, 172, 0.1));
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-shapes::before {
            width: 180px;
            height: 180px;
            top: 15%;
            right: 15%;
            animation-delay: 0s;
        }
        
        .floating-shapes::after {
            width: 120px;
            height: 120px;
            bottom: 20%;
            left: 15%;
            animation-delay: 3s;
        }
        
        .step-indicator {
            position: relative;
        }
        
        .step-indicator::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #e5e7eb, transparent);
            transform: translateY(-50%);
        }
        
        .step-indicator:last-child::after {
            display: none;
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-br from-green-50 via-white to-blue-50 min-h-screen">
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
                    <a href="/login" class="border-2 border-primary-500 text-primary-600 px-4 py-2 rounded-full text-sm font-semibold hover:bg-primary-50 transition-all duration-200">
                        Sign In
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
                <a href="/login" class="block px-3 py-2 text-primary-600 hover:text-primary-700 font-medium">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full space-y-8">
            <!-- Header -->
            <div class="text-center animate-on-load">
                <div class="mx-auto h-20 w-20 bg-gradient-to-r from-secondary-500 to-primary-600 rounded-full flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-2">Join HeartRent</h2>
                <p class="text-gray-600 text-lg">Create your account and start connecting</p>
            </div>


            <!-- Registration Form -->
            <div class="animate-on-load animate-delay-400">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <form class="space-y-6" action="{{ route('RequestRegister') }}" method="POST" id="registerForm">
                        @csrf
                        <input type="hidden" name="role" value="user">
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
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

                        <!-- Username Field -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                                Username <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input 
                                    id="username" 
                                    name="username" 
                                    type="text" 
                                    autocomplete="username" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="Choose a unique username"
                                    value="{{ old('username') }}"
                                >
                            </div>
                            @error('username')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Password <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input 
                                        id="password" 
                                        name="password" 
                                        type="password" 
                                        autocomplete="new-password" 
                                        required 
                                        class="input-focus appearance-none relative block w-full pl-10 pr-12 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                        placeholder="Create password"
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

                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Confirm Password <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input 
                                        id="password_confirmation" 
                                        name="password_confirmation" 
                                        type="password" 
                                        autocomplete="new-password" 
                                        required 
                                        class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                        placeholder="Confirm password"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Age Field -->
                        <div>
                            <label for="age" class="block text-sm font-semibold text-gray-700 mb-2">
                                Age (Umur) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <input 
                                    id="age" 
                                    name="age" 
                                    type="number" 
                                    min="18" 
                                    max="100" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="Enter your age"
                                    value="{{ old('age') }}"
                                >
                            </div>
                            @error('age')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Origin Field -->
                        <div>
                            <label for="origin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Origin (Asal) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input 
                                    id="origin" 
                                    name="origin" 
                                    type="text" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="e.g., Jakarta, Indonesia"
                                    value="{{ old('origin') }}"
                                >
                            </div>
                            @error('origin')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Telepon Field -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input 
                                    id="phone" 
                                    name="phone" 
                                    type="text" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200" 
                                    placeholder="Masukkan Nomor Telepon Yang Masih Aktif"
                                    value="{{ old('phone') }}"
                                >
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Background Field -->
                        <div>
                            <label for="background" class="block text-sm font-semibold text-gray-700 mb-2">
                                Background (Latar Belakang) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                    <i class="fas fa-graduation-cap text-gray-400"></i>
                                </div>
                                <textarea 
                                    id="background" 
                                    name="background" 
                                    rows="4" 
                                    required 
                                    class="input-focus appearance-none relative block w-full pl-10 pr-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:z-10 transition-all duration-200 resize-none" 
                                    placeholder="Tell us about your education, profession, interests, and what makes you unique..."
                                >{{ old('background') }}</textarea>
                            </div>
                            @error('background')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input 
                                    id="terms" 
                                    name="terms" 
                                    type="checkbox" 
                                    required
                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded transition-colors"
                                >
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-700">
                                    I agree to the 
                                    <a href="/terms" class="text-primary-600 hover:text-primary-700 font-semibold">Terms and Conditions</a> 
                                    and 
                                    <a href="/privacy" class="text-primary-600 hover:text-primary-700 font-semibold">Privacy Policy</a>
                                    <span class="text-red-500">*</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-semibold rounded-lg text-white bg-gradient-to-r from-secondary-500 to-primary-600 hover:from-secondary-600 hover:to-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                            >
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-user-plus text-secondary-300 group-hover:text-secondary-200"></i>
                                </span>
                                Create Account
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or sign up with</span>
                            </div>
                        </div>

                        <!-- Social Registration Buttons -->
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

            <!-- Sign In Link -->
            <div class="text-center animate-on-load animate-delay-600">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                        Sign in here
                    </a>
                </p>
            </div>

            <!-- Features -->
            <div class="animate-on-load animate-delay-800">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-user-shield text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Verified Profiles</p>
                    </div>
                    
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-heart text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Quality Matches</p>
                    </div>
                    
                    <div class="text-center p-4 bg-white/50 rounded-lg backdrop-blur-sm">
                        <div class="w-10 h-10 bg-gradient-to-r from-accent-500 to-accent-600 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-lock text-white text-sm"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Privacy Protected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Decorative Elements -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-32 h-32 bg-gradient-to-r from-secondary-200 to-primary-200 rounded-full opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-1/3 left-1/4 w-24 h-24 bg-gradient-to-r from-accent-200 to-secondary-200 rounded-full opacity-20 animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-gradient-to-r from-primary-200 to-accent-200 rounded-full opacity-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
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
            const form = document.getElementById('registerForm');
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            
            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('border-red-300')) {
                        validateField(this);
                    }
                });
                
                input.addEventListener('focus', function() {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-primary-500');
                });
            });

            // Password confirmation validation
            confirmPasswordInput.addEventListener('input', function() {
                if (passwordInput.value !== this.value) {
                    this.classList.add('border-red-300');
                    this.classList.remove('border-gray-300');
                } else {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-green-300');
                }
            });

            // Age validation
            document.getElementById('age').addEventListener('input', function() {
                const age = parseInt(this.value);
                if (age < 18 || age > 100) {
                    this.classList.add('border-red-300');
                } else {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-green-300');
                }
            });

            // Username validation (basic)
            document.getElementById('username').addEventListener('input', function() {
                const username = this.value;
                if (username.length < 3) {
                    this.classList.add('border-red-300');
                } else {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-green-300');
                }
            });

            function validateField(field) {
                if (field.value.trim() === '') {
                    field.classList.add('border-red-300');
                    field.classList.remove('border-gray-300', 'border-green-300');
                } else {
                    field.classList.remove('border-red-300');
                    field.classList.add('border-green-300');
                }
            }

            // Form submission
            form.addEventListener('submit', function(e) {
                const submitButton = form.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                // Check if passwords match
                if (passwordInput.value !== confirmPasswordInput.value) {
                    e.preventDefault();
                    confirmPasswordInput.classList.add('border-red-300');
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Password yang anda masukkan tidak cocok.",
                    });
                    return;
                }
                
                // Check terms acceptance
                const termsCheckbox = document.getElementById('terms');
                if (!termsCheckbox.checked) {
                    e.preventDefault();
                    alert('Please accept the Terms and Conditions to continue.');
                    return;
                }
                
                submitButton.innerHTML = `
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-spinner fa-spin text-secondary-300"></i>
                    </span>
                    Creating Account...
                `;
                submitButton.disabled = true;
                
                // Re-enable button after 5 seconds (in case of error)
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                }, 5000);
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

        // Character counter for background field
        document.getElementById('background').addEventListener('input', function() {
            const maxLength = 500;
            const currentLength = this.value.length;
            
            // Create or update character counter
            let counter = document.getElementById('background-counter');
            if (!counter) {
                counter = document.createElement('div');
                counter.id = 'background-counter';
                counter.className = 'text-xs text-gray-500 mt-1 text-right';
                this.parentNode.appendChild(counter);
            }
            
            counter.textContent = `${currentLength}/${maxLength} characters`;
            
            if (currentLength > maxLength) {
                counter.classList.add('text-red-500');
                this.classList.add('border-red-300');
            } else {
                counter.classList.remove('text-red-500');
                this.classList.remove('border-red-300');
            }
        });
    </script>
</body>
</html>
