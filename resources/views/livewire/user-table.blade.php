<div>
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
                                        from-{{ $user->role === 'admin' ? 'red' : ($user->role === 'companion' ? 'purple' : 'blue') }}-100 
                                        to-{{ $user->role === 'admin' ? 'red' : ($user->role === 'companion' ? 'purple' : 'blue') }}-200 
                                        text-{{ $user->role === 'admin' ? 'red' : ($user->role === 'companion' ? 'purple' : 'blue') }}-800 
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