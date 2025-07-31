@php
    // util kelas default / active agar tidak diulang
    $base = 'sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors';
    $on  = 'bg-primary-50 text-primary-600';
    $off = 'text-gray-600 hover:bg-gray-50 hover:text-gray-900';
@endphp

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
            
            <!-- Navigation - Make this section scrollable -->
            <nav class="flex-1 px-4 py-6 sidebar-nav">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="{{ $base }} {{ request()->routeIs('admin.dashboard') ? $on : $off }}">
                        <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                        Dashboard Statistik
                    </a>
                    <a href="{{ route('admin.manageUsers') }}" class="{{ $base }} {{ request()->routeIs('admin.manageUsers') ? $on : $off }}">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        Manage User
                    </a>
                    <a href="{{ route('admin.manageRental') }}" class="{{ $base }} {{ request()->routeIs('admin.manageRental') ? $on : $off }}">
                        <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>
                        Manage Rental
                    </a>
                    <a href="{{ route('admin.managePenalty') }}" class="{{ $base }} {{ request()->routeIs('admin.managePenalty') ? $on : $off }}">
                        <i class="fas fa-exclamation-triangle w-5 h-5 mr-3"></i>
                        Manage Penalty
                    </a>
                    <a href="{{ route('admin.manageServices') }}" class="{{ $base }} {{ request()->routeIs('admin.manageServices') ? $on : $off }}">
                        <i class="fas fa-cogs w-5 h-5 mr-3"></i>
                        Manage Layanan
                    </a>
                    <a href="#" class="{{ $base }} {{ request()->routeIs('admin.manageTransactions') ? $on : $off }}">
                        <i class="fas fa-credit-card w-5 h-5 mr-3"></i>
                        Manage Transaksi
                    </a>
                    <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="manage-feedback">
                        <i class="fas fa-star w-5 h-5 mr-3"></i>
                        Manage Feedback
                    </a>
                    <a href="#" class="sidebar-link flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors" data-page="manage-promos">
                        <i class="fas fa-tags w-5 h-5 mr-3"></i>
                        Manage Promo
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
                </div>
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