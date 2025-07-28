<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <title>HeartRent - Modern Rental Partner Service</title>
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
                        'slide-up': 'slideUp 0.6s ease-out forwards',
                        'slide-left': 'slideLeft 0.6s ease-out forwards',
                        'slide-right': 'slideRight 0.6s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
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
                        slideLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        slideRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
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
        
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    @include('components.navbar');

    <!-- Hero Section -->
    <section id="home" class="pt-16 min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-on-scroll">
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Bingung Cari Teman?
                        <span class="bg-gradient-to-r from-primary-500 to-purple-600 bg-clip-text text-transparent">
                            Sewa Aja Dulu!
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Dapatkan pengalaman seru bareng teman profesional kami. Mau buat acara, ngobrol santai, atau cuma butuh teman nongkrong yang asyik.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Book Now
                        </button>
                        <button class="border-2 border-primary-500 text-primary-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-primary-50 transition-all duration-200">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="animate-on-scroll lg:animate-float">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-400 to-purple-500 rounded-3xl transform rotate-6 opacity-20"></div>
                        <img src="{{ asset('images/imageLandingPage1.jpg') }}" 
                             alt="Happy couple" 
                             class="relative rounded-3xl shadow-2xl w-full max-w-md mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Temukan pengalaman bareng pendamping yang pas banget sama kebutuhan kamu</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <div class="animate-on-scroll bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                  <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                      <i class="fas fa-users text-white text-2xl"></i>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Acara Sosial</h3>
                  <p class="text-gray-600 mb-6">Butuh teman +1 buat nikahan, acara kantor, atau kumpul keluarga? Pendamping kita cocok banget buat semua acara sosial.</p>
                  
              </div>
              
              <div class="animate-on-scroll bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                  <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                      <i class="fas fa-coffee text-white text-2xl"></i>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Kencan Santai</h3>
                  <p class="text-gray-600 mb-6">Nikmati nonton, makan malam, atau ngopi bareng teman yang asyik diajak ngobrol dan bikin kamu nyaman.</p>
                  
              </div>
              
              <div class="animate-on-scroll bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                  <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6">
                      <i class="fas fa-plane text-white text-2xl"></i>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Temanci Travel</h3>
                  <p class="text-gray-600 mb-6">Jelajahi tempat baru bareng orang yang punya hobi sama. Bikin perjalanan kamu makin seru dengan teman yang asyik.</p>
                  
              </div>
          </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Begini Caranya</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Gampang banget caranya nemuin teman yang bikin hari-harimu menyenangkan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center animate-on-scroll">
                  <div class="relative mb-8">
                      <div class="w-20 h-20 bg-gradient-to-r from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                          <i class="fas fa-search text-white text-2xl"></i>
                      </div>
                      <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center text-sm font-bold">1</div>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Cari Profil</h3>
                  <p class="text-gray-600 leading-relaxed">Jelajahi berbagai pilihan pendamping kita dan temukan orang yang cocok sama selera dan hobi kamu.</p>
              </div>

              <div class="text-center animate-on-scroll">
                  <div class="relative mb-8">
                      <div class="w-20 h-20 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                          <i class="fas fa-calendar-alt text-white text-2xl"></i>
                      </div>
                      <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center text-sm font-bold">2</div>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Booking Jadwal</h3>
                  <p class="text-gray-600 leading-relaxed">Pilih tanggal, waktu, dan durasi pertemuan kamu lewat sistem booking yang gampang banget.</p>
              </div>

              <div class="text-center animate-on-scroll">
                  <div class="relative mb-8">
                      <div class="w-20 h-20 bg-gradient-to-r from-accent-500 to-accent-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                          <i class="fas fa-heart text-white text-2xl"></i>
                      </div>
                      <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center text-sm font-bold">3</div>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">Nikmati Waktu</h3>
                  <p class="text-gray-600 leading-relaxed">Bertemu sama pendamping kamu dan nikmati pengalaman yang santai tanpa tekanan, disesuaikan sama keinginan kamu.</p>
              </div>
            </div>
        </div>
    </section>

    <!-- Featured Companions -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Pendamping Terbaik</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Bertemu Dengan Beberapa Talent Terbaik Kami</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="animate-on-scroll bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <div class="p-6">
                        <div class="w-24 h-24 mx-auto mb-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Lily&backgroundColor=b6e3f4" alt="Lily" class="w-full h-full rounded-full">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Lily, 24</h3>
                        <div class="flex justify-center mb-3">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Outgoing</span>
                        </div>
                        <p class="text-gray-600 text-center mb-4">Loves art galleries, coffee shops, and meaningful conversations.</p>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2 rounded-full font-medium hover:from-blue-600 hover:to-blue-700 transition-all">
                            View Profile
                        </button>
                    </div>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <div class="p-6">
                        <div class="w-24 h-24 mx-auto mb-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Alex&backgroundColor=c0aede" alt="Alex" class="w-full h-full rounded-full">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Alex, 27</h3>
                        <div class="flex justify-center mb-3">
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">Charming</span>
                        </div>
                        <p class="text-gray-600 text-center mb-4">Great at social events, dancing, and making everyone feel comfortable.</p>
                        <button class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-2 rounded-full font-medium hover:from-purple-600 hover:to-purple-700 transition-all">
                            View Profile
                        </button>
                    </div>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <div class="p-6">
                        <div class="w-24 h-24 mx-auto mb-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Mia&backgroundColor=ffdfbf" alt="Mia" class="w-full h-full rounded-full">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Mia, 23</h3>
                        <div class="flex justify-center mb-3">
                            <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Adventurous</span>
                        </div>
                        <p class="text-gray-600 text-center mb-4">Enjoys outdoor activities, trying new restaurants, and travel adventures.</p>
                        <button class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-2 rounded-full font-medium hover:from-orange-600 hover:to-orange-700 transition-all">
                            View Profile
                        </button>
                    </div>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <div class="p-6">
                        <div class="w-24 h-24 mx-auto mb-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Ryan&backgroundColor=d1d4f9" alt="Ryan" class="w-full h-full rounded-full">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Ryan, 26</h3>
                        <div class="flex justify-center mb-3">
                            <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">Intellectual</span>
                        </div>
                        <p class="text-gray-600 text-center mb-4">Great for deep conversations, museum visits, and cultural events.</p>
                        <button class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 text-white py-2 rounded-full font-medium hover:from-indigo-600 hover:to-indigo-700 transition-all">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12 animate-on-scroll">
                <button class="border-2 border-primary-500 text-primary-600 px-8 py-3 rounded-full text-lg font-semibold hover:bg-primary-50 transition-all duration-200">
                    Lihat Semua Talent
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gradient-to-br from-blue-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Apa Kata Mereka!</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Pengalaman nyata dari customer yang puas</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="animate-on-scroll bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=John" alt="John" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">John D.</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">"I was nervous about attending my company's gala alone, but my companion made the evening enjoyable and stress-free. Highly recommend!"</p>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah M.</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">"After moving to a new city, I booked a companion to show me around. It was the perfect way to explore and feel less lonely in a new place."</p>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Michael" alt="Michael" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Michael T.</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">"The booking process was simple, and my companion was exactly as described in their profile. A very professional service that I'll use again."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Paket Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Pilih Sesuai dan Terbaik Untuk Kebutuhan Anda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="animate-on-scroll bg-white rounded-2xl border-2 border-gray-200 p-8 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Basic</h3>
                    <div class="text-center mb-8">
                        <span class="text-5xl font-bold text-gray-900">$99</span>
                        <span class="text-gray-600">/2 hours</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Casual meetup</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Coffee or lunch date</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Basic companion selection</span>
                        </li>
                        <li class="flex items-center opacity-50">
                            <i class="fas fa-times text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Premium companions</span>
                        </li>
                        <li class="flex items-center opacity-50">
                            <i class="fas fa-times text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Special events</span>
                        </li>
                    </ul>
                    <button class="w-full bg-gray-900 text-white py-3 rounded-full font-semibold hover:bg-gray-800 transition-colors">
                        Choose Basic
                    </button>
                </div>
                
                <div class="animate-on-scroll bg-gradient-to-br from-primary-500 to-primary-600 text-white rounded-2xl p-8 transform scale-105 shadow-2xl relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-accent-500 text-white px-4 py-2 rounded-full text-sm font-bold">Most Popular</span>
                    </div>
                    <h3 class="text-2xl font-bold text-center mb-4">Standard</h3>
                    <div class="text-center mb-8">
                        <span class="text-5xl font-bold">$199</span>
                        <span class="opacity-80">/4 hours</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3"></i>
                            <span>Dinner date</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3"></i>
                            <span>Social events</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3"></i>
                            <span>Wider companion selection</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3"></i>
                            <span>Premium companions</span>
                        </li>
                        <li class="flex items-center opacity-50">
                            <i class="fas fa-times mr-3"></i>
                            <span>Multi-day bookings</span>
                        </li>
                    </ul>
                    <button class="w-full bg-white text-primary-600 py-3 rounded-full font-semibold hover:bg-gray-50 transition-colors">
                        Choose Standard
                    </button>
                </div>
                
                <div class="animate-on-scroll bg-white rounded-2xl border-2 border-gray-200 p-8 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Premium</h3>
                    <div class="text-center mb-8">
                        <span class="text-5xl font-bold text-gray-900">$399</span>
                        <span class="text-gray-600">/8 hours</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Full day experience</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Special events</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">All companions available</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">VIP treatment</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Multi-day booking option</span>
                        </li>
                    </ul>
                    <button class="w-full bg-gray-900 text-white py-3 rounded-full font-semibold hover:bg-gray-800 transition-colors">
                        Choose Premium
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Hubungi Tim Kami</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="animate-on-scroll">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h3>
                    <p class="text-gray-600 mb-8 text-lg">Bingung nih? Mau tanya apa-apa? Tinggal isi form aja, kita bantu dengan senang hati!</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-primary-500 to-primary-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <span class="text-gray-700 text-lg">123 Dating Street, Romance City</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <span class="text-gray-700 text-lg">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-accent-500 to-accent-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <span class="text-gray-700 text-lg">info@heartrent.com</span>
                        </div>
                    </div>
                </div>
                
                <div class="animate-on-scroll">
                    <form class="bg-white rounded-2xl p-8 shadow-lg">
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                            <input type="text" placeholder="Your name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                            <input type="email" placeholder="Your email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Subject</label>
                            <input type="text" placeholder="Subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Message</label>
                            <textarea placeholder="Your message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all resize-none"></textarea>
                        </div>
                        <button class="w-full bg-gradient-to-r from-primary-500 to-primary-600 text-white py-3 rounded-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary-500 to-purple-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl lg:text-5xl font-bold mb-6 animate-on-scroll">Udah Siap Nemuin Teman Seru?</h2>
            <p class="text-xl mb-8 opacity-90 animate-on-scroll">Masuk bareng ribuan happy user yang udah dapetin pengalaman seru lewat kita.</p>
            <button class="bg-white text-primary-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 animate-on-scroll">
                Gas Mulai Sekarang!
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Social Events</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Casual Dates</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Travel Companions</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Special Occasions</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Jobs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Press kit</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of use</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Cookie policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Stay updated with our latest news and offers.</p>
                    <div class="flex">
                        <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <button class="bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-2 rounded-r-lg hover:from-primary-600 hover:to-primary-700 transition-all">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">Copyright © 2023 - All rights reserved by HeartRent Inc.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Intersection Observer for scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe all elements with animation classes
            document.querySelectorAll('.animate-on-scroll').forEach(element => {
                observer.observe(element);
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
