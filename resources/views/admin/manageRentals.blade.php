@extends('layouts.app-layout')

@section('title')
    <title>Manage Rental - HeartRent</title>
@endsection

@section('page_title', 'Manage Rental')

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
    .animate-on-load {
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    .animate-delay-100 { animation-delay: 0.1s; }
    .animate-delay-200 { animation-delay: 0.2s; }
    .animate-delay-300 { animation-delay: 0.3s; }
    .animate-delay-400 { animation-delay: 0.4s; }
    
    @keyframes fadeIn {
        '0%': { opacity: '0', transform: 'translateY(10px)' },
        '100%': { opacity: '1', transform: 'translateY(0)' }
    }
    
    .card-hover {
        transition: all 0.2s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .table-row-hover {
        transition: all 0.15s ease;
    }
    
    .table-row-hover:hover {
        background-color: #f8fafc;
        transform: translateX(2px);
    }
    
    .action-button {
        transition: all 0.15s ease;
        padding: 6px;
        border-radius: 6px;
    }
    
    .action-button:hover {
        background-color: rgba(59, 130, 246, 0.1);
        transform: scale(1.05);
    }
    
    .search-input:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }
    
    .stats-card {
        transition: all 0.2s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.15);
    }
    
    .status-badge {
        transition: all 0.15s ease;
    }
    
    .status-badge:hover {
        transform: scale(1.05);
    }

    /* SIDEBARR..... */
    .sidebar-transition {
        transition: all 0.3s ease-in-out;
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

@section('content')
<div class="p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 animate-on-load">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage Rental</h2>
                <p class="text-gray-600">Monitor and manage all rental bookings</p>
            </div>
            <button class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i>New Booking
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Rentals -->
            <div class="stats-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg animate-on-load">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Total Rentals</p>
                        <p class="text-2xl font-bold mt-1">1,247</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-blue-100 text-xs">+15% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Rentals -->
            <div class="stats-card bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Active Rentals</p>
                        <p class="text-2xl font-bold mt-1">156</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-green-100 text-xs">+8% today</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="stats-card bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Completed</p>
                        <p class="text-2xl font-bold mt-1">1,089</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-purple-100 text-xs">+12% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="stats-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Revenue</p>
                        <p class="text-2xl font-bold mt-1">$24,680</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-orange-100 text-xs">+18% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rental Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-on-load animate-delay-400">
            <!-- Table Header -->
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Rental Management</h3>
                        <p class="text-sm text-gray-600 mt-1">Track all rental bookings and their status</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search rentals..." class="search-input px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Completed</option>
                            <option>Cancelled</option>
                            <option>Pending</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                            <option>All Dates</option>
                            <option>Today</option>
                            <option>This Week</option>
                            <option>This Month</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Booking ID</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Client</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Companion</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Date & Time</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Duration</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Amount</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Status</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Rental Row 1 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-primary-600">#RNT-001247</div>
                                <div class="text-xs text-gray-500">Dec 22, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">JD</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">John Doe</p>
                                        <p class="text-xs text-gray-500">john.doe@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">SM</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Sarah Miller</p>
                                        <p class="text-xs text-gray-500">Companion</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 25, 2023</div>
                                <div class="text-sm text-gray-500">7:00 PM - 10:00 PM</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">3 hours</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-900">$299</div>
                                <div class="text-xs text-green-600">Paid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="status-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Message">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rental Row 2 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-primary-600">#RNT-001246</div>
                                <div class="text-xs text-gray-500">Dec 21, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">EM</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Emma Wilson</p>
                                        <p class="text-xs text-gray-500">emma.wilson@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">AK</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Alex Kim</p>
                                        <p class="text-xs text-gray-500">Companion</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 23, 2023</div>
                                <div class="text-sm text-gray-500">2:00 PM - 6:00 PM</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">4 hours</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-900">$399</div>
                                <div class="text-xs text-green-600">Paid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="status-badge px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Confirmed</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Message">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rental Row 3 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-primary-600">#RNT-001245</div>
                                <div class="text-xs text-gray-500">Dec 20, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">MJ</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Mike Johnson</p>
                                        <p class="text-xs text-gray-500">mike.johnson@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">ML</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Mia Lopez</p>
                                        <p class="text-xs text-gray-500">Companion</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 22, 2023</div>
                                <div class="text-sm text-gray-500">6:00 PM - 8:00 PM</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">2 hours</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-900">$199</div>
                                <div class="text-xs text-green-600">Paid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="status-badge px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Completed</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Review">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Receipt">
                                        <i class="fas fa-receipt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rental Row 4 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-primary-600">#RNT-001244</div>
                                <div class="text-xs text-gray-500">Dec 19, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">LB</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Lisa Brown</p>
                                        <p class="text-xs text-gray-500">lisa.brown@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">RD</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Ryan Davis</p>
                                        <p class="text-xs text-gray-500">Companion</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 24, 2023</div>
                                <div class="text-sm text-gray-500">1:00 PM - 3:00 PM</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">2 hours</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-900">$199</div>
                                <div class="text-xs text-orange-600">Pending</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="status-badge px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Pending</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="action-button text-red-600 hover:text-red-700" title="Cancel">
                                        <i class="fas fa-times"></i>
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
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">10</span> of <span class="font-semibold">1,247</span> rentals
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
    // Initialize subtle animations on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Animate elements on load with subtle timing
        const animatedElements = document.querySelectorAll('.animate-on-load');
        animatedElements.forEach((element, index) => {
            setTimeout(() => {
                element.style.opacity = '1';
            }, index * 50); // Reduced delay for subtlety
        });

        // Add gentle hover effects to action buttons
        const actionButtons = document.querySelectorAll('.action-button');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Subtle click animation for stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 100);
            });
        });

        // Search input subtle animation
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            searchInput.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        }

        // Status badge hover effect
        const statusBadges = document.querySelectorAll('.status-badge');
        statusBadges.forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    });


    
</script>
@endpush
