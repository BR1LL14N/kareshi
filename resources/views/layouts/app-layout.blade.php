<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    @stack('stylesJS')
    @stack('styles')
    
</head>
<body class="font-sans bg-gray-50">
    <!-- Sidebar -->
    @include('components.sidebarUser')
    
    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden md:hidden"></div>
    
    <!-- Main Content -->
    <div class="md:ml-64 min-h-screen">
        <!-- Top Bar - Make it sticky -->
        @include('components.navbarUser')

        <main class="p-6 main-content-with-sticky">
            @yield('content')
        </main>
    </div>


    @stack('scripts')

</body>
</html>