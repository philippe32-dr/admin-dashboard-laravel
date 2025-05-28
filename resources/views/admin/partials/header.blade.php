<header class="bg-gradient-to-r from-primary to-secondary shadow-sm sticky top-0 z-10">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button type="button" class="text-white focus:outline-none" id="mobile-menu-button">
                <i class="fas fa-bars h-6 w-6"></i>
            </button>
        </div>
        
        <!-- Title -->
        <h1 class="text-white text-xl font-semibold">@yield('header_title', 'Admin Dashboard')</h1>
        
        <!-- User dropdown -->
        <div class="relative">
            <button type="button" class="flex items-center text-white focus:outline-none bg-white bg-opacity-10 rounded-full px-3 py-1 hover:bg-opacity-20 transition-all" id="user-menu-button">
                <span class="mr-2 hidden sm:inline-block">Admin</span>
                <i class="fas fa-user-circle h-6 w-6"></i>
            </button>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const sidebar = document.querySelector('aside');
        sidebar.classList.toggle('hidden');
    });
</script>
