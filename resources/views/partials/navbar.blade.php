<header class="fixed top-0 left-0 w-full z-50 transition-all-300 py-6 px-4 md:px-10 flex items-center justify-between text-white" id="main-header">
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
    <div class="lg:hidden">
        <svg class="lucide lucide-menu" fill="none" height="28" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
    </div>
</header>

<script>
    window.addEventListener('scroll', () => {
        const header = document.getElementById('main-header');
        if (window.scrollY > 50) {
            header.classList.add('nav-scrolled');
        } else {
            header.classList.remove('nav-scrolled');
        }
    });
</script>
