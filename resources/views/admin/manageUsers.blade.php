@extends('layouts.app-layout')

@section('title')
    <title>Manage Users - HeartRent</title>
@endsection

@section('page_title', 'Manage Users')

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
                    'slide-up': 'slideUp 0.4s ease-out forwards',
                    'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    'bounce-in': 'bounceIn 0.5s ease-out forwards',
                    'scale-in': 'scaleIn 0.3s ease-out forwards',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0', transform: 'translateY(10px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    slideIn: {
                        '0%': { opacity: '0', transform: 'translateX(-10px)' },
                        '100%': { opacity: '1', transform: 'translateX(0)' }
                    },
                    slideUp: {
                        '0%': { opacity: '0', transform: 'translateY(20px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    bounceIn: {
                        '0%': { opacity: '0', transform: 'scale(0.3)' },
                        '50%': { opacity: '1', transform: 'scale(1.05)' },
                        '70%': { transform: 'scale(0.9)' },
                        '100%': { opacity: '1', transform: 'scale(1)' }
                    },
                    scaleIn: {
                        '0%': { opacity: '0', transform: 'scale(0.8)' },
                        '100%': { opacity: '1', transform: 'scale(1)' }
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
    .animate-delay-500 { animation-delay: 0.5s; }
    .animate-delay-600 { animation-delay: 0.6s; }
    .animate-delay-700 { animation-delay: 0.7s; }
    .animate-delay-800 { animation-delay: 0.8s; }
    
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
    
    .table-row-hover {
        transition: all 0.2s ease;
    }
    
    .table-row-hover:hover {
        background-color: #f8fafc;
        transform: translateX(4px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .action-button {
        transition: all 0.2s ease;
        padding: 8px;
        border-radius: 8px;
    }
    
    .action-button:hover {
        background-color: rgba(59, 130, 246, 0.1);
        transform: scale(1.1);
    }
    
    .search-input {
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
    }
    
    .stats-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .stats-card:hover::before {
        left: 100%;
    }
    
    .stats-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
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

    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stagger-animation > * {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.6s ease-out forwards;
    }

    .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
    .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
    .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
    .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
    .stagger-animation > *:nth-child(5) { animation-delay: 0.5s; }
</style>
@endpush

<!-- Manage Users Content -->
@section('content')
<div id="manage-users-content">
    <div class="max-w-7xl mx-auto">
        <!-- Header with Actions -->
        <div class="flex items-center justify-between mb-8 animate-on-load">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage Users</h2>
                <p class="text-gray-600">Manage and monitor all users in your platform</p>
            </div>
            <button class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-plus mr-2"></i>Add New User
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 stagger-animation">
            <!-- Total Users -->
            <div class="stats-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-6 text-white shadow-xl card-hover">
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

            <!-- Active Users -->
            <div class="stats-card bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-6 text-white shadow-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Active Users</p>
                        <p class="text-3xl font-bold mt-1">2,156</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-sm mr-1"></i>
                            <span class="text-green-100 text-sm">+8% from yesterday</span>
                        </div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user-check text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Users -->
            <div class="stats-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-6 text-white shadow-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Pending</p>
                        <p class="text-3xl font-bold mt-1">45</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-down text-red-300 text-sm mr-1"></i>
                            <span class="text-orange-100 text-sm">-3% from yesterday</span>
                        </div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user-clock text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Suspended Users -->
            <div class="stats-card bg-gradient-to-br from-red-500 to-red-600 rounded-3xl p-6 text-white shadow-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium">Suspended</p>
                        <p class="text-3xl font-bold mt-1">12</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-red-300 text-sm mr-1"></i>
                            <span class="text-red-100 text-sm">+2 from yesterday</span>
                        </div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user-times text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden animate-on-load animate-delay-500">
            <!-- Table Header -->
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">User Management</h3>
                        <p class="text-sm text-gray-600 mt-1">Manage all registered users and their permissions</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search users..." class="search-input px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <select class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Pending</option>
                            <option>Suspended</option>
                        </select>
                        <button class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-all duration-200 flex items-center">
                            <i class="fas fa-filter mr-2"></i>
                            Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">User</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Email</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Role</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Status</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Joined</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- User Row 1 -->
                        <tr class="table-row-hover animate-on-load animate-delay-600">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-white font-semibold text-lg">JD</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900 text-lg">John Doe</p>
                                        <p class="text-sm text-gray-500">@johndoe</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">john.doe@example.com</p>
                                <p class="text-sm text-gray-500">Verified</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 rounded-full text-xs font-semibold">Client</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="px-3 py-1 bg-gradient-to-r from-green-100 to-green-200 text-green-800 rounded-full text-xs font-semibold">Active</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">Dec 15, 2023</p>
                                <p class="text-sm text-gray-500">3 months ago</p>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="Edit User">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="View Profile">
                                        <i class="fas fa-eye text-lg"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Send Message">
                                        <i class="fas fa-envelope text-lg"></i>
                                    </button>
                                    <button class="action-button text-red-600 hover:text-red-700" title="Delete User">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 2 -->
                        <tr class="table-row-hover animate-on-load animate-delay-700">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-white font-semibold text-lg">SM</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900 text-lg">Sarah Miller</p>
                                        <p class="text-sm text-gray-500">@sarahmiller</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">sarah.miller@example.com</p>
                                <p class="text-sm text-gray-500">Verified</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 rounded-full text-xs font-semibold">Companion</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="px-3 py-1 bg-gradient-to-r from-green-100 to-green-200 text-green-800 rounded-full text-xs font-semibold">Active</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">Nov 28, 2023</p>
                                <p class="text-sm text-gray-500">4 months ago</p>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="Edit User">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="View Profile">
                                        <i class="fas fa-eye text-lg"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Send Message">
                                        <i class="fas fa-envelope text-lg"></i>
                                    </button>
                                    <button class="action-button text-red-600 hover:text-red-700" title="Delete User">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 3 -->
                        <tr class="table-row-hover animate-on-load animate-delay-800">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-white font-semibold text-lg">MJ</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900 text-lg">Mike Johnson</p>
                                        <p class="text-sm text-gray-500">@mikejohnson</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">mike.johnson@example.com</p>
                                <p class="text-sm text-orange-500">Pending verification</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 rounded-full text-xs font-semibold">Client</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-orange-500 rounded-full mr-2"></div>
                                    <span class="px-3 py-1 bg-gradient-to-r from-orange-100 to-orange-200 text-orange-800 rounded-full text-xs font-semibold">Pending</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-gray-900 font-medium">Dec 20, 2023</p>
                                <p class="text-sm text-gray-500">2 days ago</p>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="Edit User">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Approve User">
                                        <i class="fas fa-check text-lg"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Send Message">
                                        <i class="fas fa-envelope text-lg"></i>
                                    </button>
                                    <button class="action-button text-red-600 hover:text-red-700" title="Reject User">
                                        <i class="fas fa-times text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">10</span> of <span class="font-semibold">2,847</span> users
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Previous
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-lg hover:bg-primary-700 transition-colors">
                            1
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            2
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            3
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize animations on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Animate elements on load
        const animatedElements = document.querySelectorAll('.animate-on-load');
        animatedElements.forEach((element, index) => {
            setTimeout(() => {
                element.style.opacity = '1';
            }, index * 100);
        });

        // Add hover effects to action buttons
        const actionButtons = document.querySelectorAll('.action-button');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add click animation to stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Search input animation
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        }

        // Table row click animation
        const tableRows = document.querySelectorAll('.table-row-hover');
        tableRows.forEach(row => {
            row.addEventListener('click', function() {
                // Add a subtle pulse effect
                this.style.animation = 'pulse 0.3s ease-in-out';
                setTimeout(() => {
                    this.style.animation = '';
                }, 300);
            });
        });
    });

    // Sidebar functionality (keeping existing functionality)
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarClose = document.getElementById('sidebar-close');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    const pageTitle = document.getElementById('page-title');
    const pageContents = document.querySelectorAll('.page-content');

    // Toggle sidebar on mobile
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.remove('sidebar-mobile');
            sidebar.classList.add('open');
            sidebarOverlay.classList.remove('hidden');
        });
    }

    // Close sidebar
    function closeSidebar() {
        sidebar.classList.add('sidebar-mobile');
        sidebar.classList.remove('open');
        sidebarOverlay.classList.add('hidden');
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }

    // Add profile dropdown functionality
    const profileDropdown = document.getElementById('profile-dropdown');
    if (profileDropdown) {
        profileDropdown.addEventListener('click', function() {
            const menu = document.getElementById('profile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    }

    // Handle profile menu items
    document.querySelectorAll('.profile-menu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const pageName = this.dataset.page;
            
            // Hide profile menu
            const profileMenu = document.getElementById('profile-menu');
            if (profileMenu) {
                profileMenu.classList.add('hidden');
            }
            
            // Handle page navigation
            if (pageName === 'profile') {
                // Show profile content
                pageContents.forEach(content => content.classList.add('hidden'));
                const profileContent = document.getElementById('profile-content');
                if (profileContent) {
                    profileContent.classList.remove('hidden');
                }
                if (pageTitle) {
                    pageTitle.textContent = 'Profile';
                }
            }
        });
    });

    // Close profile menu when clicking outside
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profile-dropdown');
        const menu = document.getElementById('profile-menu');
        
        if (dropdown && menu && !dropdown.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            if (sidebar) {
                sidebar.classList.remove('sidebar-mobile', 'open');
            }
            if (sidebarOverlay) {
                sidebarOverlay.classList.add('hidden');
            }
        }
    });
</script>
@endpush
