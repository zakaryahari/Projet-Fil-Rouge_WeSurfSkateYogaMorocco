<header class="fixed top-0 left-0 w-full z-50 transition-all-300 py-6 px-4 md:px-10 flex items-center justify-between text-white bg-darkCharcoal" id="main-header">
    <div class="flex items-center space-x-2">
        <div class="text-2xl font-extrabold tracking-tighter">SKATE SURF<span class="text-primary">.</span></div>
    </div>
    <nav class="hidden lg:flex items-center space-x-6 text-[11px] font-bold uppercase tracking-widest">
        <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
        <a class="hover:text-primary transition-colors" href="#">Packages</a>
        <a class="hover:text-primary transition-colors" href="#">Yoga</a>
        <a class="hover:text-primary transition-colors" href="#">Surf</a>
        <a class="hover:text-primary transition-colors" href="#">Skate</a>
        <a class="hover:text-primary transition-colors" href="#">Accommodation</a>
        <a class="hover:text-primary transition-colors" href="#">About</a>
        <a class="hover:text-primary transition-colors" href="#">Contact</a>
    </nav>
    <!-- Right Side: Auth Block -->
    <div class="flex items-center space-x-4 lg:space-x-6">
        @guest
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="hidden lg:inline-block bg-primary text-white text-[11px] font-bold uppercase tracking-widest px-6 py-2 rounded-full hover:bg-white hover:text-primary transition-colors">
                Login
            </a>
        @endguest

        @auth
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                <!-- Profile Circle Avatar -->
                <button @click="open = !open" class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-primary/60 flex items-center justify-center text-white font-bold text-sm hover:ring-2 hover:ring-primary hover:ring-offset-2 hover:ring-offset-darkCharcoal transition-all" title="{{ Auth::user()->name }}">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-darkCharcoal rounded-lg shadow-2xl border border-primary/20 overflow-hidden">
                    <!-- User Name Header -->
                    <div class="px-4 py-3 border-b border-primary/10">
                        <p class="text-white font-bold text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-gray-400 text-xs">{{ Auth::user()->email }}</p>
                    </div>

                    <!-- Dropdown Links -->
                    <div class="py-2">
                        <!-- Profile Link -->
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white text-sm hover:bg-primary/10 hover:text-primary transition-colors flex items-center space-x-2" @click="open = false">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Profil</span>
                        </a>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="block" @click="open = false">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-white text-sm hover:bg-red-500/10 hover:text-red-400 transition-colors flex items-center space-x-2 border-t border-primary/10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        <!-- Mobile Menu Toggle (appears only on mobile) -->
        <div class="lg:hidden">
            <svg class="lucide lucide-menu" fill="none" height="28" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
        </div>
    </div>
</header>

<script>
    window.addEventListener('scroll', () => {
        const header = document.getElementById('main-header');
        if (window.scrollY > 50) {
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.4)';
            header.style.paddingTop = '0.75rem';
            header.style.paddingBottom = '0.75rem';
        } else {
            header.style.boxShadow = 'none';
            header.style.paddingTop = '1.5rem';
            header.style.paddingBottom = '1.5rem';
        }
    });
</script>
