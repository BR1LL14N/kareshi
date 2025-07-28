<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md z-50 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="{{ asset('images/logoRent.png') }}" alt="HeartRent Logo" class="h-10 w-auto">
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#home" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                        <a href="#services" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Layanan</a>
                        <a href="#how-it-works" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Ini Caranya!</a>
                        <a href="#testimonials" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Ulasan dari Pengguna</a>
                        <a href="#pricing" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Harga Paketnya Gimana?</a>
                        <a href="#contact" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                    </div>
                </div>
                
                <div class="hidden md:block">
                    <a href="{{ route('login') }}" class="inline-block">
                        <button class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                            Get Started
                        </button>
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
                <a href="#home" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Home</a>
                <a href="#services" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Layanan</a>
                <a href="#how-it-works" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Ini Caranya!</a>
                <a href="#testimonials" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Ulasan dari Pengguna</a>
                <a href="#pricing" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Harga Paketnya Gimana?</a>
                <a href="#contact" class="block px-3 py-2 text-gray-700 hover:text-primary-600 font-medium">Contact</a>
                <div class="px-3 py-2">
                    <button class="w-full bg-gradient-to-r from-primary-500 to-primary-600 text-white px-4 py-2 rounded-full text-sm font-medium">
                        Get Started
                    </button>
                </div>
            </div>
        </div>
    </nav>