@extends('layouts.app-layout')

    @section('title')
    <title>Dashboard - HeartRent</title>
    @endsection
    @section('page_title', 'Dashboard')
    
    @push('stylesJS')
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
    @endpush
    
    @push('styles')
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

        .sidebar-nav {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 2px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 30;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .main-content-with-sticky {
            padding-top: 0;
        }
    </style>
    @endpush

        <!-- Page Content -->
        @section('content')
            <!-- Dashboard Content -->
            <div id="dashboard-content" class="page-content">
                <!-- Modern Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Users -->
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-6 text-white shadow-xl card-hover animate-on-load">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium">Total Users</p>
                                <p class="text-3xl font-bold mt-1">2,847</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-up text-green-300 text-sm mr-1"></i>
                                    <span class="text-blue-100 text-sm">+12% from last month</span>
                                </div>
                            </div>
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Active Rentals -->
                    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-6 text-white shadow-xl card-hover animate-on-load animate-delay-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Active Rentals</p>
                                <p class="text-3xl font-bold mt-1">156</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-up text-green-300 text-sm mr-1"></i>
                                    <span class="text-green-100 text-sm">+8% from yesterday</span>
                                </div>
                            </div>
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue -->
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-6 text-white shadow-xl card-hover animate-on-load animate-delay-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm font-medium">Monthly Revenue</p>
                                <p class="text-3xl font-bold mt-1">$24,680</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-up text-green-300 text-sm mr-1"></i>
                                    <span class="text-orange-100 text-sm">+15% from last month</span>
                                </div>
                            </div>
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Reviews -->
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl p-6 text-white shadow-xl card-hover animate-on-load animate-delay-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium">Pending Reviews</p>
                                <p class="text-3xl font-bold mt-1">23</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-down text-red-300 text-sm mr-1"></i>
                                    <span class="text-purple-100 text-sm">-5% from yesterday</span>
                                </div>
                            </div>
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-star text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Analytics -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Revenue Chart -->
                    <div class="lg:col-span-2 bg-white rounded-3xl p-6 shadow-xl animate-on-load animate-delay-400">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Revenue Analytics</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 bg-primary-100 text-primary-600 rounded-lg text-sm font-medium">7D</button>
                                <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium">30D</button>
                                <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium">90D</button>
                            </div>
                        </div>
                        <div class="h-64 bg-gradient-to-t from-primary-50 to-transparent rounded-2xl flex items-end justify-center">
                            <div class="text-gray-500 text-center">
                                <i class="fas fa-chart-line text-4xl mb-2"></i>
                                <p>Chart visualization would go here</p>
                            </div>
                        </div>
                    </div>

                    <!-- Top Performers -->
                    <div class="bg-white rounded-3xl p-6 shadow-xl animate-on-load animate-delay-400">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Top Performers</h3>
                        <div class="space-y-4">
                            <div class="flex items-center p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold">
                                    1
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">Sarah M.</p>
                                    <p class="text-sm text-gray-600">156 bookings</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-blue-600">$4,280</p>
                                    <p class="text-xs text-gray-500">This month</p>
                                </div>
                            </div>

                            <div class="flex items-center p-3 bg-gradient-to-r from-green-50 to-green-100 rounded-2xl">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center text-white font-bold">
                                    2
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">Alex K.</p>
                                    <p class="text-sm text-gray-600">142 bookings</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-green-600">$3,890</p>
                                    <p class="text-xs text-gray-500">This month</p>
                                </div>
                            </div>

                            <div class="flex items-center p-3 bg-gradient-to-r from-orange-50 to-orange-100 rounded-2xl">
                                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center text-white font-bold">
                                    3
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">Mia L.</p>
                                    <p class="text-sm text-gray-600">128 bookings</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-orange-600">$3,420</p>
                                    <p class="text-xs text-gray-500">This month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities and Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Activities -->
                    <div class="bg-white rounded-3xl p-6 shadow-xl animate-on-load animate-delay-500">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Recent Activities</h3>
                            <button class="text-primary-600 hover:text-primary-700 text-sm font-medium">View All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start p-4 bg-gradient-to-r from-blue-50 to-transparent rounded-2xl border-l-4 border-blue-500">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user-plus text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">New User Registration</p>
                                    <p class="text-sm text-gray-600">John Doe joined the platform</p>
                                    <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 bg-gradient-to-r from-green-50 to-transparent rounded-2xl border-l-4 border-green-500">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-calendar-check text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">Booking Completed</p>
                                    <p class="text-sm text-gray-600">Sarah M. completed a 3-hour session</p>
                                    <p class="text-xs text-gray-400 mt-1">15 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 bg-gradient-to-r from-orange-50 to-transparent rounded-2xl border-l-4 border-orange-500">
                                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-white text-sm"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">Payment Received</p>
                                    <p class="text-sm text-gray-600">$299 payment from Alex K.</p>
                                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="bg-white rounded-3xl p-6 shadow-xl animate-on-load animate-delay-500">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">System Status</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-2xl">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                    <span class="font-medium text-gray-900">Server Status</span>
                                </div>
                                <span class="text-green-600 font-semibold">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-2xl">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                    <span class="font-medium text-gray-900">Payment Gateway</span>
                                </div>
                                <span class="text-green-600 font-semibold">Active</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-2xl">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                    <span class="font-medium text-gray-900">Email Service</span>
                                </div>
                                <span class="text-yellow-600 font-semibold">Slow</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-2xl">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                    <span class="font-medium text-gray-900">Database</span>
                                </div>
                                <span class="text-blue-600 font-semibold">Optimized</span>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Quick Actions</h4>
                            <div class="grid grid-cols-2 gap-3">
                                <button class="flex items-center justify-center p-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span class="text-sm font-medium">Add User</span>
                                </button>
                                <button class="flex items-center justify-center p-3 bg-gradient-to-r from-secondary-500 to-secondary-600 text-white rounded-xl hover:from-secondary-600 hover:to-secondary-700 transition-all">
                                    <i class="fas fa-cog mr-2"></i>
                                    <span class="text-sm font-medium">Settings</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    

    

    <!-- Continue with other management pages... -->
    @push('scripts')
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

        // Add profile dropdown functionality
        document.getElementById('profile-dropdown').addEventListener('click', function() {
            const menu = document.getElementById('profile-menu');
            menu.classList.toggle('hidden');
        });

        // Handle profile menu items
        document.querySelectorAll('.profile-menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const pageName = this.dataset.page;
                
                // Hide profile menu
                document.getElementById('profile-menu').classList.add('hidden');
                
                // Handle page navigation
                if (pageName === 'profile') {
                    // Show profile content
                    pageContents.forEach(content => content.classList.add('hidden'));
                    document.getElementById('profile-content').classList.remove('hidden');
                    pageTitle.textContent = 'Profile';
                }
            });
        });

        // Close profile menu when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('profile-dropdown');
            const menu = document.getElementById('profile-menu');
            
            if (!dropdown.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });

        

        // Initialize active states
        

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('sidebar-mobile', 'open');
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>
    @endpush