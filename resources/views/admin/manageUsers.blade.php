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

    /* Modal Styles */
    .modal-show {
        display: flex !important;
    }

    .modal-show #modal-content {
        transform: scale(1);
        opacity: 1;
    }

    .modal-backdrop {
        backdrop-filter: blur(4px);
    }

    /* Form Styles */
    .form-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
    }

    /* Password Toggle */
    .password-visible {
        color: #3b82f6;
    }
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
            <button id="add-user-btn" class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
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
            @livewire('user-table')
        </div>

        <!-- Add New User Modal -->
        <div id="add-user-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="modal-content">
                <!-- Modal Header -->
                <div class="sticky top-0 bg-white border-b border-gray-200 px-8 py-6 rounded-t-3xl z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Add New User</h3>
                            <p class="text-sm text-gray-600 mt-1">Create a new user account with complete information</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6">
                    <form id="add-user-form" class="space-y-6">
                        <!-- Username -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-user mr-2 text-primary-500"></i>Username
                            </label>
                            <input type="text" id="username" name="username" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter username">
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-envelope mr-2 text-primary-500"></i>Email Address
                            </label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter email address">
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="flex items-center text-sm font-semibold text-gray-700">
                                <i class="fas fa-lock mr-2 text-primary-500"></i>Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter password">
                                <button type="button" id="toggle-password"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-phone mr-2 text-primary-500"></i>Nomor Telepon
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Contoh: +62 812-3456-7890">
                        </div>

                        <!-- Origin (Asal) -->
                        <div class="space-y-2">
                            <label for="origin" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-map-marker-alt mr-2 text-primary-500"></i>Asal Daerah
                            </label>
                            <input type="text" id="origin" name="origin" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Contoh: Jakarta, Indonesia">
                        </div>

                        <!-- Age -->
                        <div class="space-y-2">
                            <label for="age" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-birthday-cake mr-2 text-primary-500"></i>Umur
                            </label>
                            <input type="number" id="age" name="age" min="18" max="100" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Masukkan umur">
                        </div>

                        <!-- Background -->
                        <div class="space-y-2">
                            <label for="background" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-graduation-cap mr-2 text-primary-500"></i>Latar Belakang
                            </label>
                            <textarea id="background" name="background" rows="4" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 resize-none"
                                      placeholder="Ceritakan tentang latar belakang pendidikan, pekerjaan, atau pengalaman..."></textarea>
                        </div>

                        <!-- User Role -->
                        <div class="space-y-2">
                            <label for="role" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-user-tag mr-2 text-primary-500"></i>Role
                            </label>
                            <select id="role" name="role" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                                <option value="">Pilih Role</option>
                                <option value="client">Client</option>
                                <option value="companion">Companion</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <button type="button" id="cancel-btn" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                            Cancel
                        </button>
                        <button type="submit" form="add-user-form" class="px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            <i class="fas fa-plus mr-2"></i>Create User
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div id="edit-user-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="edit-modal-content">
                <!-- Modal Header -->
                <div class="sticky top-0 bg-white border-b border-gray-200 px-8 py-6 rounded-t-3xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Edit User</h3>
                            <p class="text-sm text-gray-600 mt-1">Update user information and settings</p>
                        </div>
                        <button id="close-edit-modal" class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6">
                    <form id="edit-user-form" class="space-y-6">
                        <input type="hidden" id="edit-user-id" name="user_id">
                        
                        <!-- Username -->
                        <div class="space-y-2">
                            <label for="edit-username" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Username
                            </label>
                            <input type="text" id="edit-username" name="username" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter username">
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="edit-email" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                            </label>
                            <input type="email" id="edit-email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter email address">
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label for="edit-phone" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-phone mr-2 text-blue-500"></i>Nomor Telepon
                            </label>
                            <input type="tel" id="edit-phone" name="phone" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Contoh: +62 812-3456-7890">
                        </div>

                        <!-- Origin (Asal) -->
                        <div class="space-y-2">
                            <label for="edit-origin" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>Asal Daerah
                            </label>
                            <input type="text" id="edit-origin" name="origin" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Contoh: Jakarta, Indonesia">
                        </div>

                        <!-- Age -->
                        <div class="space-y-2">
                            <label for="edit-age" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>Umur
                            </label>
                            <input type="number" id="edit-age" name="age" min="18" max="100" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Masukkan umur">
                        </div>

                        <!-- Background -->
                        <div class="space-y-2">
                            <label for="edit-background" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-graduation-cap mr-2 text-blue-500"></i>Latar Belakang
                            </label>
                            <textarea id="edit-background" name="background" rows="4" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                      placeholder="Ceritakan tentang latar belakang pendidikan, pekerjaan, atau pengalaman..."></textarea>
                        </div>

                        <!-- User Role -->
                        <div class="space-y-2">
                            <label for="edit-role" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-user-tag mr-2 text-blue-500"></i>Role
                            </label>
                            <select id="edit-role" name="role" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="">Pilih Role</option>
                                <option value="client">Client</option>
                                <option value="companion">Companion</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="space-y-2">
                            <label for="edit-status" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-toggle-on mr-2 text-blue-500"></i>Status
                            </label>
                            <select id="edit-status" name="status" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="active">Active</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <button type="button" id="cancel-edit-btn" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                            Cancel
                        </button>
                        <button type="submit" form="edit-user-form" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>Update User
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Send Message Modal -->
        <div id="message-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-95 opacity-0" id="message-modal-content">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-8 py-6 rounded-t-3xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">Send Message</h3>
                                <p class="text-orange-100 text-sm">Send a message to <span id="message-user-name">user</span></p>
                            </div>
                        </div>
                        <button id="close-message-modal" class="text-orange-100 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-full">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6">
                    <form id="send-message-form" class="space-y-6">
                        <input type="hidden" id="message-user-id" name="user_id">
                        
                        <!-- Subject -->
                        <div class="space-y-2">
                            <label for="message-subject" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-tag mr-2 text-orange-500"></i>Subject
                            </label>
                            <input type="text" id="message-subject" name="subject" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter message subject">
                        </div>

                        <!-- Message Type -->
                        <div class="space-y-2">
                            <label for="message-type" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-list mr-2 text-orange-500"></i>Message Type
                            </label>
                            <select id="message-type" name="type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                                <option value="">Select Type</option>
                                <option value="notification">Notification</option>
                                <option value="warning">Warning</option>
                                <option value="reminder">Reminder</option>
                                <option value="welcome">Welcome Message</option>
                                <option value="general">General</option>
                            </select>
                        </div>

                        <!-- Message Content -->
                        <div class="space-y-2">
                            <label for="message-content" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-comment mr-2 text-orange-500"></i>Message
                            </label>
                            <textarea id="message-content" name="message" rows="6" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 resize-none"
                                      placeholder="Type your message here..."></textarea>
                            <div class="text-right text-sm text-gray-500">
                                <span id="char-count">0</span>/500 characters
                            </div>
                        </div>

                        <!-- Priority -->
                        <div class="space-y-2">
                            <label for="message-priority" class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-exclamation-circle mr-2 text-orange-500"></i>Priority
                            </label>
                            <select id="message-priority" name="priority" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200">
                                <option value="low">Low</option>
                                <option value="normal" selected>Normal</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <button type="button" id="cancel-message-btn" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                            Cancel
                        </button>
                        <button type="submit" form="send-message-form" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="delete-modal-content">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-6 rounded-t-3xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Delete User</h3>
                            <p class="text-red-100 text-sm">This action cannot be undone</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="px-8 py-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-times text-2xl text-red-600"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Are you sure?</h4>
                        <p class="text-gray-600 mb-4">
                            You are about to delete <strong id="delete-user-name">user</strong>. 
                            This will permanently remove all user data, including:
                        </p>
                        <ul class="text-left text-sm text-gray-600 bg-gray-50 rounded-xl p-4 mb-6">
                            <li class="flex items-center mb-2">
                                <i class="fas fa-check text-red-500 mr-2"></i>
                                Profile information and settings
                            </li>
                            <li class="flex items-center mb-2">
                                <i class="fas fa-check text-red-500 mr-2"></i>
                                Message history and conversations
                            </li>
                            <li class="flex items-center mb-2">
                                <i class="fas fa-check text-red-500 mr-2"></i>
                                Booking history and transactions
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-red-500 mr-2"></i>
                                Reviews and ratings
                            </li>
                        </ul>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                                <p class="text-sm text-yellow-800">
                                    <strong>Warning:</strong> This action is irreversible and cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="delete-user-id" name="user_id">
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <button type="button" id="cancel-delete-btn" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                            Cancel
                        </button>
                        <button type="button" id="confirm-delete-btn" class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            <i class="fas fa-trash mr-2"></i>Delete User
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

    // Modal functionality
    const addUserBtn = document.getElementById('add-user-btn');
    const addUserModal = document.getElementById('add-user-modal');
    const closeModalBtn = document.getElementById('close-modal');
    const cancelBtn = document.getElementById('cancel-btn');
    const addUserForm = document.getElementById('add-user-form');
    const modalContent = document.getElementById('modal-content');

    // Show modal
    function showModal() {
        addUserModal.classList.remove('hidden');
        addUserModal.classList.add('modal-show', 'modal-backdrop');
        document.body.style.overflow = 'hidden';
        
        // Animate modal appearance
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Hide modal
    function hideModal() {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            addUserModal.classList.add('hidden');
            addUserModal.classList.remove('modal-show', 'modal-backdrop');
            document.body.style.overflow = 'auto';
            addUserForm.reset();
        }, 300);
    }

    // Event listeners
    if (addUserBtn) {
        addUserBtn.addEventListener('click', showModal);
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', hideModal);
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', hideModal);
    }

    // Close modal when clicking outside
    addUserModal.addEventListener('click', function(e) {
        if (e.target === addUserModal) {
            hideModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !addUserModal.classList.contains('hidden')) {
            hideModal();
        }
    });

    // Password toggle functionality
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.classList.remove('password-visible');
            } else {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.classList.add('password-visible');
            }
        });
    }

    // Form submission
    if (addUserForm) {
        addUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const userData = Object.fromEntries(formData);
            
            // Here you can add your form submission logic
            console.log('User data:', userData);
            
            // Show success message (you can customize this)
            alert('User berhasil ditambahkan!');
            
            // Hide modal
            hideModal();
        });
    }

    // Form validation styling
    const formInputs = document.querySelectorAll('#add-user-form input, #add-user-form textarea, #add-user-form select');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.add('form-input');
        });
        
        input.addEventListener('blur', function() {
            this.classList.remove('form-input');
        });
    });


    // Edit User Modal functionality
    const editUserModal = document.getElementById('edit-user-modal');
    const closeEditModalBtn = document.getElementById('close-edit-modal');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const editUserForm = document.getElementById('edit-user-form');
    const editModalContent = document.getElementById('edit-modal-content');

    // Message Modal functionality
    const messageModal = document.getElementById('message-modal');
    const closeMessageModalBtn = document.getElementById('close-message-modal');
    const cancelMessageBtn = document.getElementById('cancel-message-btn');
    const sendMessageForm = document.getElementById('send-message-form');
    const messageModalContent = document.getElementById('message-modal-content');
    const messageContent = document.getElementById('message-content');
    const charCount = document.getElementById('char-count');

    // Delete Modal functionality
    const deleteModal = document.getElementById('delete-modal');
    const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    const deleteModalContent = document.getElementById('delete-modal-content');

    // Show Edit Modal
    function showEditModal(userData) {
        document.getElementById('edit-user-id').value = userData.id;
        document.getElementById('edit-username').value = userData.username;
        document.getElementById('edit-email').value = userData.email;
        document.getElementById('edit-phone').value = userData.phone || '';
        document.getElementById('edit-origin').value = userData.origin || '';
        document.getElementById('edit-age').value = userData.age || '';
        document.getElementById('edit-background').value = userData.background || '';
        document.getElementById('edit-role').value = userData.role;
        document.getElementById('edit-status').value = userData.status;

        editUserModal.classList.remove('hidden');
        editUserModal.classList.add('modal-show', 'modal-backdrop');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            editModalContent.style.transform = 'scale(1)';
            editModalContent.style.opacity = '1';
        }, 10);
    }

    // Hide Edit Modal
    function hideEditModal() {
        editModalContent.style.transform = 'scale(0.95)';
        editModalContent.style.opacity = '0';
        
        setTimeout(() => {
            editUserModal.classList.add('hidden');
            editUserModal.classList.remove('modal-show', 'modal-backdrop');
            document.body.style.overflow = 'auto';
            editUserForm.reset();
        }, 300);
    }

    // Show Message Modal
    function showMessageModal(userData) {
        document.getElementById('message-user-id').value = userData.id;
        document.getElementById('message-user-name').textContent = userData.name;

        messageModal.classList.remove('hidden');
        messageModal.classList.add('modal-show', 'modal-backdrop');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            messageModalContent.style.transform = 'scale(1)';
            messageModalContent.style.opacity = '1';
        }, 10);
    }

    // Hide Message Modal
    function hideMessageModal() {
        messageModalContent.style.transform = 'scale(0.95)';
        messageModalContent.style.opacity = '0';
        
        setTimeout(() => {
            messageModal.classList.add('hidden');
            messageModal.classList.remove('modal-show', 'modal-backdrop');
            document.body.style.overflow = 'auto';
            sendMessageForm.reset();
            charCount.textContent = '0';
        }, 300);
    }

    // Show Delete Modal
    function showDeleteModal(userData) {
        document.getElementById('delete-user-id').value = userData.id;
        document.getElementById('delete-user-name').textContent = userData.name;

        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('modal-show', 'modal-backdrop');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            deleteModalContent.style.transform = 'scale(1)';
            deleteModalContent.style.opacity = '1';
        }, 10);
    }

    // Hide Delete Modal
    function hideDeleteModal() {
        deleteModalContent.style.transform = 'scale(0.95)';
        deleteModalContent.style.opacity = '0';
        
        setTimeout(() => {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('modal-show', 'modal-backdrop');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Event listeners for Edit Modal
    if (closeEditModalBtn) {
        closeEditModalBtn.addEventListener('click', hideEditModal);
    }
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', hideEditModal);
    }

    // Event listeners for Message Modal
    if (closeMessageModalBtn) {
        closeMessageModalBtn.addEventListener('click', hideMessageModal);
    }
    if (cancelMessageBtn) {
        cancelMessageBtn.addEventListener('click', hideMessageModal);
    }

    // Event listeners for Delete Modal
    if (cancelDeleteBtn) {
        cancelDeleteBtn.addEventListener('click', hideDeleteModal);
    }

    // Close modals when clicking outside
    editUserModal.addEventListener('click', function(e) {
        if (e.target === editUserModal) {
            hideEditModal();
        }
    });

    messageModal.addEventListener('click', function(e) {
        if (e.target === messageModal) {
            hideMessageModal();
        }
    });

    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            hideDeleteModal();
        }
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (!editUserModal.classList.contains('hidden')) {
                hideEditModal();
            }
            if (!messageModal.classList.contains('hidden')) {
                hideMessageModal();
            }
            if (!deleteModal.classList.contains('hidden')) {
                hideDeleteModal();
            }
        }
    });

    // Character counter for message
    if (messageContent && charCount) {
        messageContent.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = length;
            
            if (length > 500) {
                charCount.style.color = '#ef4444';
                this.value = this.value.substring(0, 500);
                charCount.textContent = '500';
            } else if (length > 450) {
                charCount.style.color = '#f59e0b';
            } else {
                charCount.style.color = '#6b7280';
            }
        });
    }

    // Handle action button clicks
    document.addEventListener('click', function(e) {
        const button = e.target.closest('.action-button');
        if (!button) return;

        const row = button.closest('tr');
        const userData = {
            id: row.dataset.userId || Math.floor(Math.random() * 1000), // Temporary ID
            name: row.querySelector('td:first-child .font-semibold').textContent,
            username: row.querySelector('td:first-child .text-gray-500').textContent.replace('@', ''),
            email: row.querySelector('td:nth-child(2) .font-medium').textContent,
            role: row.querySelector('td:nth-child(3) span').textContent.toLowerCase(),
            status: row.querySelector('td:nth-child(4) span').textContent.toLowerCase(),
            phone: '+62 812-3456-7890', // Sample data
            origin: 'Jakarta, Indonesia', // Sample data
            age: '25', // Sample data
            background: 'Sample background information' // Sample data
        };

        if (button.title === 'Edit User') {
            showEditModal(userData);
        } else if (button.title === 'Send Message') {
            showMessageModal(userData);
        } else if (button.title === 'Delete User') {
            showDeleteModal(userData);
        }
    });

    // Form submissions
    if (editUserForm) {
        editUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const userData = Object.fromEntries(formData);
            
            console.log('Updated user data:', userData);
            alert('User berhasil diupdate!');
            hideEditModal();
        });
    }

    if (sendMessageForm) {
        sendMessageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const messageData = Object.fromEntries(formData);
            
            console.log('Message data:', messageData);
            alert('Pesan berhasil dikirim!');
            hideMessageModal();
        });
    }

    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const userId = document.getElementById('delete-user-id').value;
            const userName = document.getElementById('delete-user-name').textContent;
            
            console.log('Deleting user:', { id: userId, name: userName });
            alert('User berhasil dihapus!');
            hideDeleteModal();
            
            // Here you would typically remove the row from the table
            // or refresh the page/data
        });
    }
</script>
@endpush
