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

    /* Custom scrollbar untuk modal */
    .modal-body-scroll {
        overflow-y-auto;
        scrollbar-width: thin;
        scrollbar-color: #d1d5db #f9fafb;
    }
    .modal-body-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .modal-body-scroll::-webkit-scrollbar-track {
        background: #f9fafb;
        border-radius: 3px;
    }
    .modal-body-scroll::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 3px;
    }
    .modal-body-scroll::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
</style>
@endpush

<!-- Manage Users Content -->
@section('content')

    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            {{ session('message') }}
        </div>
    @endif
<div id="manage-users-content">
    @livewire('user-table')     
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


    // Edit User Modal functionality
    // 

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
