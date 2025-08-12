
    <div class="max-w-7xl mx-auto">
        <!-- Header with Actions -->
        <div class="flex items-center justify-between mb-8 animate-on-load">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manage Users</h2>
                <p class="text-gray-600">Manage and monitor all users in your platform</p>
            </div>
            <button id="add-user-btn" class="bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1" wire:click="create" wire:loading.attr="disabled">
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
<!-- Table Header -->
 <div class="bg-white rounded-3xl shadow-xl overflow-hidden animate-on-load animate-delay-500">
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
                        @forelse($users as $user)
                            <tr class="table-row-hover animate-on-load">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white font-semibold text-lg">
                                                {{ strtoupper(substr($user->username, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <p class="font-semibold text-gray-900 text-lg">{{ $user->username }}</p>
                                            <p class="text-sm text-gray-500 ">@ {{ strtolower($user->username) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                                    <p class="text-sm text-gray-500">Verified</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-gradient-to-r 
                                        from-{{ $user->role === 'admin' ? 'blue' : 'purple' }}-100 
                                        to-{{ $user->role === 'admin' ? 'blue' : 'purple' }}-200 
                                        text-{{ $user->role === 'admin' ? 'blue' : 'purple'}}-800 
                                        rounded-full text-xs font-semibold">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 {{ $user->is_banned ? 'bg-red-500' : 'bg-green-500' }} rounded-full mr-2"></div>
                                        <span class="px-3 py-1 bg-gradient-to-r 
                                            from-{{ $user->is_banned ? 'red' : 'green' }}-100 
                                            to-{{ $user->is_banned ? 'red' : 'green' }}-200 
                                            text-{{ $user->is_banned ? 'red' : 'green' }}-800 
                                            rounded-full text-xs font-semibold">
                                            {{ $user->is_banned ? 'Banned' : 'Safe' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-900 font-medium">{{ $user->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex space-x-2">
                                        <button wire:click="edit({{ $user->id }})" class="action-button" title="Edit User">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-button text-green-600 hover:text-green-700" title="View Profile">
                                            <i class="fas fa-eye text-lg"></i>
                                        </button>
                                        <button class="action-button text-orange-600 hover:text-orange-700" title="Send Message">
                                            <i class="fas fa-envelope text-lg"></i>
                                        </button>
                                        <button 
                                            wire:click="confirmDelete({{ $user->id }}, '{{ $user->username }}')"
                                            class="action-button text-red-600 hover:text-red-700"
                                            title="Delete User">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-500">No users found.</td>
                            </tr>
                        @endforelse
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

        
    <!-- ✅ MODAL: Add/Edit User (Livewire) -->
    @if($showModal && !$showDeleteModal)
    <div 
        x-data="{ show: true, passwordVisible: false }"
        x-show="show"
        x-on:keydown.escape.window="$wire.closeModal()"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="background-color: rgba(0, 0, 0, 0.5);"
        wire:keydown.escape="$set('showModal', false)"
        @click="$wire.closeModal()"
    >
        <form 
            wire:submit="save"
            class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col"
            @click.stop
        >
            
            <!-- ✅ Modal Header: STICKY -->
            <div class="sticky top-0 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-6 rounded-t-3xl z-10 shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-edit text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">
                                {{ $isEditing ? 'Edit User' : 'Add New User' }}
                            </h3>
                            <p class="text-blue-100 text-sm">
                                {{ $isEditing ? 'Update data pengguna' : 'Tambahkan pengguna baru' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="px-8 py-6 space-y-6 flex-1 overflow-y-auto scrollbar-thin">
                <div class="px-8 py-6 space-y-6">
                    
                    <!-- Username -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-user mr-2 text-blue-500"></i> Username
                        </label>
                        <input type="text"
                            wire:model="username"
                            class="w-full px-4 py-3 border {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }} rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="Masukkan username">
                        @error('username') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i> Email
                        </label>
                        <input type="email"
                            wire:model="email"
                            class="w-full px-4 py-3 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="Masukkan email">
                        @error('email') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-lock mr-2 text-blue-500"></i> 
                            {{ $isEditing ? 'Password (opsional)' : 'Password' }}
                        </label>
                        <div class="relative">
                            <input :type="passwordVisible ? 'text' : 'password'"
                                wire:model="password"
                                class="w-full px-4 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="{{ $isEditing ? 'Kosongkan jika tidak ingin ganti password' : 'Masukkan password' }}">
                            <button type="button" @click="passwordVisible = !passwordVisible" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                <i :class="passwordVisible ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </button>
                        </div>
                        @error('password') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-phone mr-2 text-blue-500"></i> Phone
                        </label>
                        <input type="text"
                            wire:model="phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: +628123456789">
                    </div>

                    <!-- Origin -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i> Asal
                        </label>
                        <input type="text"
                            wire:model="origin"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: Jakarta, Indonesia">
                    </div>

                    <!-- Age -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-birthday-cake mr-2 text-blue-500"></i> Usia
                        </label>
                        <input type="number"
                            wire:model="age"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Usia">
                        @error('age')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Background -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-info-circle mr-2 text-blue-500"></i> Latar Belakang
                        </label>
                        <textarea wire:model="background"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Tentang user..."></textarea>
                    </div>

                    <!-- Role -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-user-tag mr-2 text-blue-500"></i> Role
                        </label>
                        <select wire:model="role"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Pilih Role</option>
                            <option value="user">user</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- is_banned (Dropdown) -->
                    @if($isEditing)
                        <div class="space-y-2 pt-4 border-t">
                            <label class="block text-sm font-semibold text-gray-700">
                                <i class="fas fa-ban mr-2 text-red-500"></i> Status Akun
                            </label>
                            <select wire:model="is_banned"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="0">Aktif</option>
                                <option value="1">Dibanned</option>
                            </select>
                            <p class="text-sm text-gray-500">User yang dibanned tidak bisa login.</p>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Modal Footer -->
            <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                    <button type="button"
                            @click="show = false"
                            wire:click="$set('showModal', false)"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                        <i class="fas fa-save mr-2"></i>
                        {{ $isEditing ? 'Update User' : 'Create User' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif

    


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

        <!-- Delete User Modal (Livewire) -->
        @if($showDeleteModal && !$showModal)
    <div 
        x-data="{ show: true }"
        x-show="show"
        x-on:keydown.escape.window="$wire.closeDeleteModal()"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
        @click="$wire.closeDeleteModal()"
    >
        <div 
            class="bg-white rounded-3xl shadow-2xl w-full max-w-md"
            @click.stop
        >
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
                        You are about to delete <strong>{{ $deleteUserName }}</strong>. 
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
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 border-t border-gray-200 px-8 py-6 rounded-b-3xl">
                <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                    <button 
                        type="button" 
                        wire:click="closeDeleteModal"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-semibold">
                        Cancel
                    </button>
                    <button 
                        type="button" 
                        wire:click="delete"
                        wire:loading.attr="disabled"
                        class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl disabled:opacity-50">
                        <span wire:loading.remove><i class="fas fa-trash mr-2"></i>Delete User</span>
                        <span wire:loading>Menghapus...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    </div>
