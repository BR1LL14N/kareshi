@extends('layouts.app-layout')

@section('title')
    <title>Manage Penalty - HeartRent</title>
@endsection

@section('page_title', 'Manage Penalty')

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
                    'fade-in': 'fadeIn 0.5s ease-out forwards',
                    'slide-in': 'slideIn 0.3s ease-out forwards',
                    'slide-up': 'slideUp 0.4s ease-out forwards',
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
                        '0%': { opacity: '0', transform: 'translateY(15px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
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
    
    .animate-on-load {
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    .animate-delay-100 { animation-delay: 0.1s; }
    .animate-delay-200 { animation-delay: 0.2s; }
    .animate-delay-300 { animation-delay: 0.3s; }
    .animate-delay-400 { animation-delay: 0.4s; }
    
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
        background-color: #fef2f2;
        transform: translateX(2px);
    }
    
    .action-button {
        transition: all 0.15s ease;
        padding: 6px;
        border-radius: 6px;
    }
    
    .action-button:hover {
        background-color: rgba(239, 68, 68, 0.1);
        transform: scale(1.05);
    }
    
    .search-input:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
    }
    
    .stats-card {
        transition: all 0.2s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.15);
    }
    
    .penalty-badge {
        transition: all 0.15s ease;
    }
    
    .penalty-badge:hover {
        transform: scale(1.05);
    }
    
    .severity-indicator {
        transition: all 0.2s ease;
    }
    
    .severity-indicator:hover {
        transform: scale(1.1);
    }

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
<div id="manage-penalty-content">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 animate-on-load">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage Penalty</h2>
                <p class="text-gray-600">Monitor and manage penalty cases and violations</p>
            </div>
            <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                <i class="fas fa-plus mr-2"></i>Add Penalty
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Penalties -->
            <div class="stats-card bg-gradient-to-br from-red-500 to-red-600 rounded-2xl p-6 text-white shadow-lg animate-on-load">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium">Total Penalties</p>
                        <p class="text-2xl font-bold mt-1">89</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-down text-green-300 text-xs mr-1"></i>
                            <span class="text-red-100 text-xs">-12% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Cases -->
            <div class="stats-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Active Cases</p>
                        <p class="text-2xl font-bold mt-1">23</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-red-300 text-xs mr-1"></i>
                            <span class="text-orange-100 text-xs">+3 this week</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-gavel text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Resolved -->
            <div class="stats-card bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Resolved</p>
                        <p class="text-2xl font-bold mt-1">66</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-green-100 text-xs">+8% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Fines -->
            <div class="stats-card bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Total Fines</p>
                        <p class="text-2xl font-bold mt-1">$4,280</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-down text-green-300 text-xs mr-1"></i>
                            <span class="text-purple-100 text-xs">-5% this month</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Penalty Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-on-load animate-delay-400">
            <!-- Table Header -->
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Penalty Management</h3>
                        <p class="text-sm text-gray-600 mt-1">Track violations, penalties, and disciplinary actions</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search penalties..." class="search-input px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Resolved</option>
                            <option>Appealed</option>
                            <option>Dismissed</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                            <option>All Severity</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                            <option>Critical</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Case ID</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">User</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Violation Type</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Severity</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Date</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Fine Amount</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Status</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Penalty Row 1 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-red-600">#PEN-001089</div>
                                <div class="text-xs text-gray-500">Dec 22, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">MJ</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Mike Johnson</p>
                                        <p class="text-xs text-gray-500">Client</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">No Show</div>
                                <div class="text-sm text-gray-500">Failed to attend scheduled meeting</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="severity-indicator w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">High</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 20, 2023</div>
                                <div class="text-sm text-gray-500">2 days ago</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-red-600">$150</div>
                                <div class="text-xs text-orange-600">Unpaid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="penalty-badge px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">Active</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Resolve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Penalty Row 2 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-red-600">#PEN-001088</div>
                                <div class="text-xs text-gray-500">Dec 21, 2023</div>
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
                                <div class="font-medium text-gray-900">Late Arrival</div>
                                <div class="text-sm text-gray-500">Arrived 45 minutes late</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="severity-indicator w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Medium</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 19, 2023</div>
                                <div class="text-sm text-gray-500">3 days ago</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-red-600">$75</div>
                                <div class="text-xs text-green-600">Paid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="penalty-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Resolved</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Receipt">
                                        <i class="fas fa-receipt"></i>
                                    </button>
                                    <button class="action-button text-gray-600 hover:text-gray-700" title="Archive">
                                        <i class="fas fa-archive"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Penalty Row 3 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-red-600">#PEN-001087</div>
                                <div class="text-xs text-gray-500">Dec 18, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">AK</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Alex Kim</p>
                                        <p class="text-xs text-gray-500">Companion</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Policy Violation</div>
                                <div class="text-sm text-gray-500">Inappropriate behavior reported</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="severity-indicator w-3 h-3 bg-red-600 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Critical</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 15, 2023</div>
                                <div class="text-sm text-gray-500">1 week ago</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-red-600">$300</div>
                                <div class="text-xs text-blue-600">Under Review</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="penalty-badge px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Appealed</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Review Appeal">
                                        <i class="fas fa-balance-scale"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Contact User">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Penalty Row 4 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-red-600">#PEN-001086</div>
                                <div class="text-xs text-gray-500">Dec 17, 2023</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">LB</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">Lisa Brown</p>
                                        <p class="text-xs text-gray-500">Client</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Payment Default</div>
                                <div class="text-sm text-gray-500">Failed to pay service fee</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="severity-indicator w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">Medium</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 14, 2023</div>
                                <div class="text-sm text-gray-500">1 week ago</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-red-600">$50</div>
                                <div class="text-xs text-green-600">Paid</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="penalty-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Resolved</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Receipt">
                                        <i class="fas fa-receipt"></i>
                                    </button>
                                    <button class="action-button text-gray-600 hover:text-gray-700" title="Archive">
                                        <i class="fas fa-archive"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Penalty Row 5 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="font-mono text-sm font-semibold text-red-600">#PEN-001085</div>
                                <div class="text-xs text-gray-500">Dec 16, 2023</div>
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
                                <div class="font-medium text-gray-900">Dress Code</div>
                                <div class="text-sm text-gray-500">Inappropriate attire for event</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="severity-indicator w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Low</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">Dec 12, 2023</div>
                                <div class="text-sm text-gray-500">10 days ago</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-red-600">$25</div>
                                <div class="text-xs text-gray-600">Dismissed</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="penalty-badge px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Dismissed</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-gray-600 hover:text-gray-700" title="Archive">
                                        <i class="fas fa-archive"></i>
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
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">10</span> of <span class="font-semibold">89</span> penalties
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Previous
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg hover:bg-red-700 transition-colors">
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
            }, index * 50);
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

        // Penalty badge hover effect
        const penaltyBadges = document.querySelectorAll('.penalty-badge');
        penaltyBadges.forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Severity indicator hover effect
        const severityIndicators = document.querySelectorAll('.severity-indicator');
        severityIndicators.forEach(indicator => {
            indicator.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            
            indicator.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Table row hover effect with red tint
        const tableRows = document.querySelectorAll('.table-row-hover');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#fef2f2';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    });
</script>
@endpush
