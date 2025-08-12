<div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 animate-on-load">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage Layanan</h2>
                <p class="text-gray-600">Kelola semua layanan dan paket yang tersedia</p>
            </div>
            <button class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl" wire:click="openCreateModal">
                <i class="fas fa-plus mr-2"></i>Tambah Layanan
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Layanan -->
            <div class="stats-card bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg animate-on-load">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-indigo-100 text-sm font-medium">Total Layanan</p>
                        <p class="text-2xl font-bold mt-1">47</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-indigo-100 text-xs">+5 layanan baru</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-concierge-bell text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Layanan Aktif -->
            <div class="stats-card bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Layanan Aktif</p>
                        <p class="text-2xl font-bold mt-1">42</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-green-100 text-xs">89% dari total</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Kategori -->
            <div class="stats-card bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Kategori</p>
                        <p class="text-2xl font-bold mt-1">8</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-purple-100 text-xs">+2 kategori baru</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-layer-group text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Rata-rata Harga -->
            <div class="stats-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg animate-on-load animate-delay-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Rata-rata Harga</p>
                        <p class="text-2xl font-bold mt-1">$125</p>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-arrow-up text-green-300 text-xs mr-1"></i>
                            <span class="text-orange-100 text-xs">+8% bulan ini</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-on-load animate-delay-400">
            <!-- Table Header -->
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Manajemen Layanan</h3>
                        <p class="text-sm text-gray-600 mt-1">Kelola semua layanan, harga, dan ketersediaan</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Cari layanan..." class="search-input px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            <option>Semua Kategori</option>
                            <option>Dinner Date</option>
                            <option>Business Event</option>
                            <option>Social Gathering</option>
                            <option>Travel Companion</option>
                            <option>Cultural Event</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            <option>Semua Status</option>
                            <option>Aktif</option>
                            <option>Tidak Aktif</option>
                            <option>Draft</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Layanan</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Kategori</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Durasi</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Harga</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Popularitas</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Status</th>
                            <th class="text-left py-3 px-6 font-semibold text-gray-700 text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Service Row 1 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-utensils text-white text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900">Elegant Dinner Date</p>
                                        <p class="text-sm text-gray-500">Makan malam romantis di restoran mewah</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="category-indicator w-3 h-3 bg-pink-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-800 rounded-full text-xs font-medium">Dinner Date</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">3-4 jam</div>
                                <div class="text-sm text-gray-500">19:00 - 23:00</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="price-tag font-bold text-lg text-gray-900">$180</div>
                                <div class="text-xs text-gray-500">per sesi</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 mr-2">
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">4.9 (127)</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="service-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Aktif</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Settings">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Service Row 2 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-briefcase text-white text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900">Business Event Companion</p>
                                        <p class="text-sm text-gray-500">Pendamping profesional untuk acara bisnis</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="category-indicator w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Business Event</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">4-6 jam</div>
                                <div class="text-sm text-gray-500">Fleksibel</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="price-tag font-bold text-lg text-gray-900">$250</div>
                                <div class="text-xs text-gray-500">per sesi</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 mr-2">
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star-half-alt text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">4.7 (89)</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="service-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Aktif</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Settings">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Service Row 3 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-users text-white text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900">Social Gathering</p>
                                        <p class="text-sm text-gray-500">Pendamping untuk acara sosial dan pesta</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="category-indicator w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Social Gathering</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">2-5 jam</div>
                                <div class="text-sm text-gray-500">Sesuai acara</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="price-tag font-bold text-lg text-gray-900">$120</div>
                                <div class="text-xs text-gray-500">per sesi</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 mr-2">
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="far fa-star text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">4.2 (156)</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="service-badge px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Aktif</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-button text-purple-600 hover:text-purple-700" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Settings">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Service Row 4 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-violet-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-plane text-white text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900">Travel Companion</p>
                                        <p class="text-sm text-gray-500">Pendamping perjalanan wisata</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="category-indicator w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">Travel Companion</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">1-3 hari</div>
                                <div class="text-sm text-gray-500">Paket wisata</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="price-tag font-bold text-lg text-gray-900">$400</div>
                                <div class="text-xs text-gray-500">per hari</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 mr-2">
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">4.8 (43)</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="service-badge px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Draft</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Publish">
                                        <i class="fas fa-rocket"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Service Row 5 -->
                        <tr class="table-row-hover">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-theater-masks text-white text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-900">Cultural Event</p>
                                        <p class="text-sm text-gray-500">Pendamping untuk acara budaya dan seni</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="category-indicator w-3 h-3 bg-amber-500 rounded-full mr-2"></div>
                                    <span class="px-2 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Cultural Event</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">2-4 jam</div>
                                <div class="text-sm text-gray-500">Sesuai acara</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="price-tag font-bold text-lg text-gray-900">$150</div>
                                <div class="text-xs text-gray-500">per sesi</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 mr-2">
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star text-xs"></i>
                                        <i class="fas fa-star-half-alt text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">4.6 (72)</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="service-badge px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Tidak Aktif</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-1">
                                    <button class="action-button text-blue-600 hover:text-blue-700" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-button text-green-600 hover:text-green-700" title="Activate">
                                        <i class="fas fa-play"></i>
                                    </button>
                                    <button class="action-button text-orange-600 hover:text-orange-700" title="Edit">
                                        <i class="fas fa-edit"></i>
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
                        Menampilkan <span class="font-semibold">1</span> sampai <span class="font-semibold">10</span> dari <span class="font-semibold">47</span> layanan
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Sebelumnya
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg hover:bg-indigo-700 transition-colors">
                            1
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            2
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            3
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- ✅ MODAL: Add/Edit Layanan (Match Style, Minimal Kolom) -->
        @if($showServiceModal)
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-on:keydown.escape.window="$wire.closeServiceModal()"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 z-50 flex items-center justify-center p-4"
                style="background-color: rgba(0, 0, 0, 0.5);"
                wire:keydown.escape="$set('showServiceModal', false)"
                @click="$wire.closeServiceModal()"
            >
                <form 
                    wire:submit="saveService"
                    class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col"
                    @click.stop
                >
                    
                    <!-- ✅ Modal Header -->
                    <div class="sticky top-0 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-8 py-6 rounded-t-3xl z-10 shadow-md">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-concierge-bell text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">
                                        {{ $isEditingService ? 'Edit Layanan' : 'Tambah Layanan Baru' }}
                                    </h3>
                                    <p class="text-indigo-100 text-sm">
                                        {{ $isEditingService ? 'Perbarui layanan yang ada' : 'Buat layanan baru' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="px-8 py-6 space-y-6 flex-1 overflow-y-auto scrollbar-thin">
                        <div class="space-y-6">

                            <!-- Nama Layanan -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-tag mr-2 text-indigo-500"></i> Nama Layanan
                                </label>
                                <input type="text"
                                    wire:model="nama_layanan"
                                    class="w-full px-4 py-3 border {{ $errors->has('nama_layanan') ? 'border-red-500' : 'border-gray-300' }} rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Masukkan nama layanan">
                                @error('nama_layanan') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-align-left mr-2 text-indigo-500"></i> Deskripsi
                                </label>
                                <textarea wire:model="deskripsi"
                                        rows="4"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                        placeholder="Jelaskan layanan ini..."></textarea>
                                @error('deskripsi') 
                                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                        <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                            <button type="button"
                                    @click="show = false"
                                    wire:click="closeServiceModal"
                                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white rounded-xl hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                                <i class="fas fa-save mr-2"></i>
                                {{ $isEditingService ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

</div>