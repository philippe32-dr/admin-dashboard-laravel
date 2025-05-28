<aside class="bg-white w-full md:w-64 shadow-sm flex-shrink-0 border-r border-gray-200 md:sticky top-0 h-auto md:h-screen z-10">
    <div class="p-5 bg-gradient-to-r from-primary to-secondary">
        <h2 class="text-white text-xl font-semibold flex items-center">
            <i class="fas fa-tachometer-alt mr-2"></i> Admin Dashboard
        </h2>
    </div>
    
    <nav class="mt-4 px-2">
        <ul>
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-dark hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium' : '' }}">
                        <i class="fas fa-home h-5 w-5 mr-3"></i>
                    Tableau de bord
                </a>
            </li>
            
            <li class="mb-2">
                <a href="{{ route('admin.clients.list') }}" class="flex items-center px-4 py-2 text-dark hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.clients.*') ? 'bg-gray-100 font-medium' : '' }}">
                        <i class="fas fa-users h-5 w-5 mr-3"></i>
                    Clients
                </a>
            </li>
            
            <li class="mb-2">
                <a href="{{ route('admin.subscriptions.manage') }}" class="flex items-center px-4 py-2 text-dark hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.subscriptions.*') ? 'bg-gray-100 font-medium' : '' }}">
                        <i class="fas fa-credit-card h-5 w-5 mr-3"></i>
                    Abonnements
                </a>
            </li>
        </ul>
    </nav>
</aside>
