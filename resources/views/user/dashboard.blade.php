<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <title>Dashboard</title>
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
                        'slide-in': 'slideIn 0.3s ease-out forwards',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideIn: {
                            '0%': { opacity: '0', transform: 'translateX(-10px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .animate-on-load {
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }
        .animate-delay-400 { animation-delay: 0.4s; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .notification-dot {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @media (max-width: 768px) {
            .sidebar-mobile {
                transform: translateX(-100%);
            }
            .sidebar-mobile.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl sidebar-transition sidebar-mobile md:translate-x-0">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <div class="flex items-center">
                    <img src="{{ asset('images/logoRent.png') }}" alt="HeartRent Logo" class="h-8 w-auto">
                </div>
                <button id="sidebar-close" class="md:hidden text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <!-- User Info -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-lg">{{ substr(auth()->user()->username ?? 'U', 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->username ?? 'Username' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" class="sidebar-link active flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="dashboard">
                    <i class="fas fa-home w-5 h-5 mr-3"></i>
                    Dashboard
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="profile">
                    <i class="fas fa-user w-5 h-5 mr-3"></i>
                    Profile
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="notifications">
                    <i class="fas fa-bell w-5 h-5 mr-3"></i>
                    Notifikasi
                    <span class="ml-auto w-2 h-2 bg-red-500 rounded-full notification-dot"></span>
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="history">
                    <i class="fas fa-history w-5 h-5 mr-3"></i>
                    History Aktivitas
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="search">
                    <i class="fas fa-search w-5 h-5 mr-3"></i>
                    Cari Talent
                </a>
            </nav>
            
            <!-- Logout -->
            <div class="p-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden md:hidden"></div>
    
    <!-- Main Content -->
    <div class="md:ml-64 min-h-screen">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-6">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="md:hidden text-gray-500 hover:text-gray-700 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 id="page-title" class="text-xl font-semibold text-gray-900">Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-dropdown" class="flex items-center p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                            <div class="w-8 h-8 bg-gradient-to-r from-primary-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->username ?? 'U', 0, 1) }}</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="p-6">
            <!-- Dashboard Content -->
            <div id="dashboard-content" class="page-content">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-on-load">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                                <p class="text-2xl font-bold text-gray-900">24</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-on-load animate-delay-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Active Sessions</p>
                                <p class="text-2xl font-bold text-gray-900">3</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-on-load animate-delay-200">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-accent-500 to-accent-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Rating</p>
                                <p class="text-2xl font-bold text-gray-900">4.8</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover animate-on-load animate-delay-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Spent</p>
                                <p class="text-2xl font-bold text-gray-900">$1,240</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Recent Activity -->
                    <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg animate-on-load animate-delay-400">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-primary-500 to-primary-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-calendar text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Booking Confirmed</p>
                                    <p class="text-xs text-gray-500">Dinner date with Sarah M. - Tomorrow 7:00 PM</p>
                                </div>
                                <span class="text-xs text-gray-400">2h ago</span>
                            </div>
                            
                            <div class="flex items-center p-4 bg-green-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-star text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-sm font-medium text-gray-900">Review Received</p>
                                    <p class="text-xs text-gray-500">Alex rated your experience 5 stars</p>
                                </div>
                                <span class="text-xs text-gray-400">1d ago</span>
                            </div>
                            
                            <div class="flex items-center p-4 bg-orange-50 rounded-lg">
                                <div class="w-10 h-10 bg-gradient-to-r from-accent-500 to-accent-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-message text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-sm font-medium text-gray-900">New Message</p>
                                    <p class="text-xs text-gray-500">Mia sent you a message about weekend plans</p>
                                </div>
                                <span class="text-xs text-gray-400">2d ago</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg animate-on-load animate-delay-400">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full flex items-center p-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-lg hover:from-primary-600 hover:to-primary-700 transition-all">
                                <i class="fas fa-plus mr-3"></i>
                                New Booking
                            </button>
                            <button class="w-full flex items-center p-3 bg-gradient-to-r from-secondary-500 to-secondary-600 text-white rounded-lg hover:from-secondary-600 hover:to-secondary-700 transition-all">
                                <i class="fas fa-search mr-3"></i>
                                Find Talent
                            </button>
                            <button class="w-full flex items-center p-3 bg-gradient-to-r from-accent-500 to-accent-600 text-white rounded-lg hover:from-accent-600 hover:to-accent-700 transition-all">
                                <i class="fas fa-message mr-3"></i>
                                Messages
                            </button>
                        </div>
                        
                        <!-- Upcoming Events -->
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Upcoming Events</h4>
                            <div class="space-y-2">
                                <div class="p-3 bg-blue-50 rounded-lg">
                                    <p class="text-sm font-medium text-gray-900">Dinner Date</p>
                                    <p class="text-xs text-gray-500">Tomorrow, 7:00 PM</p>
                                </div>
                                <div class="p-3 bg-green-50 rounded-lg">
                                    <p class="text-sm font-medium text-gray-900">Coffee Meeting</p>
                                    <p class="text-xs text-gray-500">Friday, 2:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Content -->
            <div id="profile-content" class="page-content hidden">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <!-- Profile Header -->
                        <div class="bg-gradient-to-r from-primary-500 to-purple-600 px-6 py-8">
                            <div class="flex items-center">
                                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center">
                                    <span class="text-primary-600 font-bold text-2xl">{{ substr(auth()->user()->username ?? 'U', 0, 1) }}</span>
                                </div>
                                <div class="ml-6 text-white">
                                    <h2 class="text-2xl font-bold">{{ auth()->user()->username ?? 'Username' }}</h2>
                                    <p class="opacity-90">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Profile Form -->
                        <div class="p-6">
                            <form class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                                        <input type="text" value="{{ auth()->user()->username ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                        <input type="email" value="{{ auth()->user()->email ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Age</label>
                                        <input type="number" value="{{ auth()->user()->age ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Origin</label>
                                        <input type="text" value="{{ auth()->user()->origin ?? '' }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Background</label>
                                    <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">{{ auth()->user()->background ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all">
                                    Update Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Notifications Content -->
            <div id="notifications-content" class="page-content hidden">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Notifikasi</h2>
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                                <i class="fas fa-calendar text-blue-500 mt-1 mr-3"></i>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">Booking Reminder</p>
                                    <p class="text-sm text-gray-600">Your dinner date with Sarah is tomorrow at 7:00 PM</p>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                                <i class="fas fa-star text-green-500 mt-1 mr-3"></i>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">New Review</p>
                                    <p class="text-sm text-gray-600">Alex left you a 5-star review for your recent meeting</p>
                                    <p class="text-xs text-gray-400 mt-1">1 day ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-4 bg-orange-50 rounded-lg border-l-4 border-orange-500">
                                <i class="fas fa-message text-orange-500 mt-1 mr-3"></i>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">New Message</p>
                                    <p class="text-sm text-gray-600">Mia sent you a message about weekend plans</p>
                                    <p class="text-xs text-gray-400 mt-1">2 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- History Content -->
            <div id="history-content" class="page-content hidden">
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">History Aktivitas</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Activity</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Companion</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Duration</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-4 text-gray-900">Dec 15, 2023</td>
                                        <td class="py-3 px-4 text-gray-900">Dinner Date</td>
                                        <td class="py-3 px-4 text-gray-900">Sarah M.</td>
                                        <td class="py-3 px-4 text-gray-900">3 hours</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Completed</span>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-4 text-gray-900">Dec 12, 2023</td>
                                        <td class="py-3 px-4 text-gray-900">Coffee Meeting</td>
                                        <td class="py-3 px-4 text-gray-900">Alex K.</td>
                                        <td class="py-3 px-4 text-gray-900">2 hours</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Completed</span>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-4 text-gray-900">Dec 10, 2023</td>
                                        <td class="py-3 px-4 text-gray-900">Social Event</td>
                                        <td class="py-3 px-4 text-gray-900">Mia L.</td>
                                        <td class="py-3 px-4 text-gray-900">4 hours</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Completed</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Search Content -->
            <div id="search-content" class="page-content hidden">
                <div class="max-w-6xl mx-auto">
                    <!-- Search Header -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Cari Talent</h2>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <input type="text" placeholder="Search by name..." class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option>All Ages</option>
                                <option>18-25</option>
                                <option>26-35</option>
                                <option>36+</option>
                            </select>
                            <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option>All Locations</option>
                                <option>Jakarta</option>
                                <option>Surabaya</option>
                                <option>Bandung</option>
                            </select>
                            <button class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all">
                                Search
                            </button>
                        </div>
                    </div>
                    
                    <!-- Talent Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="p-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-primary-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white font-bold text-xl">S</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Sarah M.</h3>
                                <p class="text-sm text-gray-600 text-center mb-4">24 years old • Jakarta</p>
                                <div class="flex justify-center mb-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                                </div>
                                <p class="text-sm text-gray-600 text-center mb-4">Loves art galleries, coffee shops, and meaningful conversations.</p>
                                <button class="w-full bg-gradient-to-r from-primary-500 to-primary-600 text-white py-2 rounded-lg font-medium hover:from-primary-600 hover:to-primary-700 transition-all">
                                    View Profile
                                </button>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="p-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white font-bold text-xl">A</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Alex K.</h3>
                                <p class="text-sm text-gray-600 text-center mb-4">27 years old • Surabaya</p>
                                <div class="flex justify-center mb-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                                </div>
                                <p class="text-sm text-gray-600 text-center mb-4">Great at social events, dancing, and making everyone feel comfortable.</p>
                                <button class="w-full bg-gradient-to-r from-secondary-500 to-secondary-600 text-white py-2 rounded-lg font-medium hover:from-secondary-600 hover:to-secondary-700 transition-all">
                                    View Profile
                                </button>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                            <div class="p-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-accent-500 to-accent-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white font-bold text-xl">M</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Mia L.</h3>
                                <p class="text-sm text-gray-600 text-center mb-4">23 years old • Bandung</p>
                                <div class="flex justify-center mb-4">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">(4.7)</span>
                                </div>
                                <p class="text-sm text-gray-600 text-center mb-4">Enjoys outdoor activities, trying new restaurants, and travel adventures.</p>
                                <button class="w-full bg-gradient-to-r from-accent-500 to-accent-600 text-white py-2 rounded-lg font-medium hover:from-accent-600 hover:to-accent-700 transition-all">
                                    View Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sidebar functionality
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const pageTitle = document.getElementById('page-title');
        const pageContents = document.querySelectorAll('.page-content');

        // Toggle sidebar on mobile
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.remove('sidebar-mobile');
            sidebar.classList.add('open');
            sidebarOverlay.classList.remove('hidden');
        });

        // Close sidebar
        function closeSidebar() {
            sidebar.classList.add('sidebar-mobile');
            sidebar.classList.remove('open');
            sidebarOverlay.classList.add('hidden');
        }

        sidebarClose.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Page navigation
        sidebarLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove active class from all links
                sidebarLinks.forEach(l => {
                    l.classList.remove('active', 'bg-primary-50', 'text-primary-600');
                    l.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');
                });
                
                // Add active class to clicked link
                link.classList.add('active', 'bg-primary-50', 'text-primary-600');
                link.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');
                
                // Get page name
                const pageName = link.dataset.page;
                
                // Update page title
                const titles = {
                    'dashboard': 'Dashboard',
                    'profile': 'Profile',
                    'notifications': 'Notifikasi',
                    'history': 'History Aktivitas',
                    'search': 'Cari Talent'
                };
                pageTitle.textContent = titles[pageName];
                
                // Hide all page contents
                pageContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show selected page content
                const targetContent = document.getElementById(`${pageName}-content`);
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                }
                
                // Close sidebar on mobile after navigation
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });

        // Initialize active states
        document.addEventListener('DOMContentLoaded', () => {
            // Set initial active state
            const activeLink = document.querySelector('.sidebar-link.active');
            if (activeLink) {
                activeLink.classList.add('bg-primary-50', 'text-primary-600');
                activeLink.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');
            }
            
            // Set inactive states
            sidebarLinks.forEach(link => {
                if (!link.classList.contains('active')) {
                    link.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-900');
                }
            });

            // Animate elements on load
            const animatedElements = document.querySelectorAll('.animate-on-load');
            animatedElements.forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                }, index * 100);
            });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('sidebar-mobile', 'open');
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
