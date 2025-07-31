<header class="sticky-header bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-6">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="md:hidden text-gray-500 hover:text-gray-700 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 id="page-title" class="text-xl font-semibold text-gray-900">@yield('page_title', 'Dashboard')</h1>
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
                            <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div id="profile-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                            <a href="#" class="profile-menu-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" data-page="profile">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <hr class="my-1">
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>