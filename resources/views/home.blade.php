@extends('layouts.app')

@section('content')
    <!-- BEGIN: Hero Section -->
    <section class="relative h-screen w-full flex items-center justify-center overflow-hidden bg-darkCharcoal">
        <div class="absolute inset-0 z-0">
            <img alt="Surfer at sunset" class="w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzqcpBG0aFhR3e2p9YXJM1OsVru5bFFVdNCLBwztsgYdQEs2CKgIEp5MSI-yrG-rNjrg_TDa_hdCKBtlZOZmlkKHeHS9LJ3ri3Bdqzp-n7cp_ELDFbPvWCV8yewiIYqcIgmikQ8OthUfkA--HTkf98e-4qSakyjzYtywtLCJpgT6EXi8esNI6wmNp7D6aqe8i84F8YNeHo3S18IvpXTbCEwYF7v68OIxEnSeKFoF6R2DqNURRCJUCzR3fnJDJda7HUTzZBLERArNc"/>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-darkCharcoal"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6 text-white text-center md:text-left">
            <h1 class="text-5xl md:text-8xl font-extrabold mb-6 leading-tight uppercase tracking-tighter">Ride into the <br/><span class="text-primary">twilight</span> energy</h1>
            <p class="text-lg md:text-xl max-w-2xl mb-10 text-gray-300 font-medium">
                Unleash your potential with our premier surf and skate training programs. Experience the magic of the Moroccan coast through movement and balance.
            </p>
            <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-12">
                <!-- Google Rating -->
                <div class="flex flex-col items-center md:items-start" data-purpose="rating-google">
                    <span class="font-bold text-xs mb-2 uppercase tracking-widest text-primary">Google Maps</span>
                    <div class="flex items-center space-x-1">
                        <span class="text-lg font-bold mr-2">4.9</span>
                        <div class="flex text-yellow-400">
                            <svg fill="currentColor" height="16" viewbox="0 0 24 24" width="16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg fill="currentColor" height="16" viewbox="0 0 24 24" width="16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg fill="currentColor" height="16" viewbox="0 0 24 24" width="16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg fill="currentColor" height="16" viewbox="0 0 24 24" width="16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg fill="currentColor" height="16" viewbox="0 0 24 24" width="16"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                    </div>
                </div>
                <!-- Trustpilot Rating -->
                <div class="flex flex-col items-center md:items-start" data-purpose="rating-trustpilot">
                    <span class="font-bold text-xs mb-2 uppercase tracking-widest text-primary">Trustpilot</span>
                    <div class="flex items-center space-x-1">
                        <span class="text-lg font-bold mr-2">Excellent</span>
                        <div class="flex space-x-1">
                            <div class="w-4 h-4 bg-[#00b67a] flex items-center justify-center text-[10px]">★</div>
                            <div class="w-4 h-4 bg-[#00b67a] flex items-center justify-center text-[10px]">★</div>
                            <div class="w-4 h-4 bg-[#00b67a] flex items-center justify-center text-[10px]">★</div>
                            <div class="w-4 h-4 bg-[#00b67a] flex items-center justify-center text-[10px]">★</div>
                            <div class="w-4 h-4 bg-[#00b67a] flex items-center justify-center text-[10px]">★</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
                <svg class="lucide lucide-chevron-down" fill="none" height="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m6 9 6 6 6-6"></path></svg>
            </div>
        </div>
    </section>
    <!-- END: Hero Section -->

    <!-- Alert Section -->
    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-600 p-6 mx-6 my-6 rounded-lg">
            <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-red-600 text-2xl">error</span>
                <div>
                    <p class="text-red-800 font-bold text-lg">Access Denied</p>
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- BEGIN: Welcome Section -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mb-20">
                <div data-purpose="welcome-text">
                    <span class="text-primary font-extrabold tracking-[0.2em] uppercase text-xs mb-4 block">Adventure Awaits</span>
                    <h2 class="text-4xl md:text-6xl font-extrabold mb-8 text-darkCharcoal leading-[1.1] uppercase">Skate Surf Camp <br/>Morocco</h2>
                    <p class="text-gray-500 mb-10 text-lg leading-relaxed max-w-xl">
                        Immerse yourself in the ultimate fusion of waves and concrete. Our retreat combines the raw thrill of Moroccan surfing with the technical creativity of surf-skating, all balanced by grounding yoga sessions.
                    </p>
                    <button class="bg-darkCharcoal text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-primary transition-colors" onclick="document.getElementById('footer').scrollIntoView({behavior: 'smooth'})">Start Your Journey</button>
                </div>
                <div class="grid grid-cols-2 gap-4 h-[600px]" data-purpose="masonry-gallery">
                    <div class="h-full">
                        <img alt="Surfing Action" class="w-full h-full object-cover rounded-[2rem] shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGi8OeFWu9tfG3iiv560d8YpJpNV8cPzTniZ5xEpNtTVCQ4sE9wvPwFm7LWQtzCwLrtqkj5Ii-HysBhZfOc_FIjJiKAhAk_K_QaE1mllarUW3JCXCHt2NOXXQdkxlD82db2C7Ld22QZlJ_v3LRoxmzDoF1qTaFdjBZJi-5lRtK1V4MBP5I_hxhBoNA47wkRcaiucd0Hl6Ba87cDviO7ZfN8zjdOWMdPIZ_IINAUlLuf9U2vVmWjRe9uKBqRGIspARwZ9yUSaADm7o"/>
                    </div>
                    <div class="grid grid-rows-2 gap-4 h-full">
                        <img alt="Yoga on beach" class="w-full h-full object-cover rounded-[2rem] shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlOvYLwIBB_oyUGW3LqEcE6GZZoA4euoWtsbKslO4u39s6DPTowOHatCcb6mILch6x9kuxNO1KJ4MTSsU57kDnE57-57D0oWprqcrnApCbE6ksUXuCp7Fhiit8V_84XLKRXBV9jWylLP5cXE9XiOJD973AoeV62Dm0uqzdoqD_VfLI87YTjc2fQCQIcLFUtOC35MTapWl1Qw55nOojfIl4Gh2DmjMrcsBz6Z4fT-fBACD7Lx8JxiS1Mtv00HEVOWK_hoLCyJ2h4O4"/>
                        <img alt="Skateboarding" class="w-full h-full object-cover rounded-[2rem] shadow-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLP1LAFdpvD3ociQTUcUshm_G3EgAod90ERSBT-K4d7tL-r3ZbxiPoqrxMi7IW6iq9KLmv7FXJygLitxcGPs__ud7JZYlzMsqqpGDcHg2co5CJg7fk8N5xBrbmegG44fjLZrNF5P1c-EyoiRbXZUGRbPrldtF88o9-NgMKpoCMT0v2O91TBqsViL1NaVrdzfr3JR6taVmMJ4bzYGRVGo58H6iJXnOWsONQIPsJSUtYtdiQgfB6g15TZCTaPVeRxYn63UfmJJgDTRA"/>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-20 border-t border-gray-100">
                <div class="flex flex-col items-center md:items-start">
                    <span class="text-5xl font-extrabold text-darkCharcoal mb-2">10,000+</span>
                    <span class="text-xs uppercase text-primary font-bold tracking-widest">Happy Guests</span>
                </div>
                <div class="flex flex-col items-center md:items-start">
                    <span class="text-5xl font-extrabold text-darkCharcoal mb-2">1,568+</span>
                    <span class="text-xs uppercase text-primary font-bold tracking-widest">Surf Lessons</span>
                </div>
                <div class="flex flex-col items-center md:items-start">
                    <span class="text-5xl font-extrabold text-darkCharcoal mb-2">35+</span>
                    <span class="text-xs uppercase text-primary font-bold tracking-widest">Pro Coaches</span>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Welcome Section -->

    <!-- BEGIN: Packages Carousel Section -->
    <section class="py-24 bg-gray-50" id="packages">
        <div class="container mx-auto px-6 text-center mb-16">
            <span class="text-primary font-extrabold tracking-widest uppercase text-xs mb-4 block">Tailored Experiences</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal uppercase tracking-tighter">Our Packages</h2>
        </div>

        <!-- Alpine Carousel Wrapper -->
        <div x-data="{
            scrollNext() {
                this.$refs.slider.scrollBy({ left: 400, behavior: 'smooth' });
            },
            scrollPrev() {
                this.$refs.slider.scrollBy({ left: -400, behavior: 'smooth' });
            }
        }" class="container mx-auto px-6 relative overflow-hidden">

            <!-- Previous Button -->
            <button @click="scrollPrev()" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-primary text-white p-3 rounded-full hover:bg-darkCharcoal transition-colors shadow-lg hidden md:flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <!-- Scrollable Container -->
            <div x-ref="slider" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth" style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none; mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);" data-no-scroll>
                @forelse($packages as $package)
                    <!-- Package Card -->
                    <a href="{{ route('packages.show', $package->id) }}" class="flex-shrink-0 w-96 snap-center bg-white rounded-[2.5rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all group block text-decoration-none">
                        <div class="relative h-72 overflow-hidden">
                            <img alt="{{ $package->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ asset($package->image_path ? 'storage/' . $package->image_path : 'images/default-package.png') }}">
                            <span class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-[0.2em] shadow-lg">New</span>
                        </div>
                        <div class="p-10">
                            <h3 class="text-2xl font-extrabold mb-4 uppercase leading-tight">{{ $package->name }}</h3>
                            <p class="text-gray-600 text-sm mb-6 line-clamp-2">{{ $package->description }}</p>
                            <div class="flex items-center text-primary font-bold text-sm mb-6">
                                <span>{{ $package->duration_days }} Days</span>
                                <span class="mx-3 opacity-30">|</span>
                                <span>Expert Level</span>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                <div>
                                    <span class="text-gray-400 text-[10px] uppercase font-bold block mb-1">Price starts at</span>
                                    <span class="text-3xl font-extrabold text-darkCharcoal">€{{ number_format($package->base_price, 0) }}</span>
                                </div>
                                <div class="bg-primary text-white p-4 rounded-full group-hover:bg-darkCharcoal transition-colors">
                                    <svg class="lucide lucide-arrow-right" fill="none" height="20" stroke="currentColor" stroke-width="3" viewbox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full text-center py-12 text-gray-500">No packages available</div>
                @endforelse
            </div>

            <!-- Next Button -->
            <button @click="scrollNext()" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-primary text-white p-3 rounded-full hover:bg-darkCharcoal transition-colors shadow-lg hidden md:flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>
    <!-- END: Packages Carousel Section -->

    <!-- BEGIN: Accommodation Section -->
    <section class="py-24 bg-white" id="accommodation">
        <div class="container mx-auto px-6 text-center mb-16">
            <span class="text-primary font-extrabold tracking-widest uppercase text-xs mb-4 block">Your Home in Morocco</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal uppercase tracking-tighter">Accommodation</h2>
        </div>
        <div x-data="{
            scrollNext() {
                this.$refs.slider.scrollBy({ left: 400, behavior: 'smooth' });
            },
            scrollPrev() {
                this.$refs.slider.scrollBy({ left: -400, behavior: 'smooth' });
            }
        }" class="container mx-auto px-6 relative overflow-hidden">

            <!-- Previous Button -->
            <button @click="scrollPrev()" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-primary text-white p-3 rounded-full hover:bg-darkCharcoal transition-colors shadow-lg hidden md:flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <!-- Scrollable Container -->
            <div x-ref="slider" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth" style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none; mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);" data-no-scroll>
                @forelse($rooms as $room)
                    <!-- Room Card -->
                    <div class="flex-shrink-0 w-[500px] snap-center relative group cursor-pointer overflow-hidden rounded-[2rem] h-[450px]" data-purpose="accommodation-card">
                        <img alt="{{ $room->type }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset($room->image_path ? 'storage/' . $room->image_path : 'images/default-room.png') }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-10 text-white">
                            <h3 class="text-3xl font-extrabold uppercase mb-2">{{ $room->type }} Room</h3>
                            <p class="text-gray-300 text-sm mb-6">Private sanctuary for all travelers.</p>
                            <a href="{{ route('bookings.packages') }}" class="bg-primary text-white text-[10px] font-black py-3 px-8 rounded-full uppercase tracking-widest w-fit hover:bg-white hover:text-primary transition-all inline-block">Book Now</a>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center py-12 text-gray-500">No rooms available</div>
                @endforelse
            </div>

            <!-- Next Button -->
            <button @click="scrollNext()" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-primary text-white p-3 rounded-full hover:bg-darkCharcoal transition-colors shadow-lg hidden md:flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>
    <!-- END: Accommodation Section -->

    <!-- BEGIN: Why Choose Us Section -->
    <section class="flex flex-col lg:flex-row bg-darkCharcoal text-white min-h-[700px]">
        <div class="lg:w-1/2 grid grid-cols-2 gap-4 p-8 bg-gray-900">
            <img alt="Surf 1" class="w-full h-full object-cover rounded-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk2afy89oCeax6l2bcbQZKnD-Y7OGlO8sZDqLP7BHVaah-8HxhGrmN8-mxlfFok1T96Y-5-ivYeIMOw8XRSZ1JJpInUChIZ_D1FKLfeGd5RtBK15UlpC9D6wklzt_Po5F5xUvSRB0yWZpklFIfneRx-_oxlke--U7x-rXh16-ZXU9iLu8Q07ZgoCcm6p7fG9ZKCzfP2-Z0bJBVkig4UAKUc9-XoKZvfstkCpUF6cP2InHAWLQwEGNMwrkzjwfdGhlUo1QhKbtCDrA"/>
            <img alt="Skate 1" class="w-full h-full object-cover rounded-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-KyM2C5mEnYgEC-AswGth0vbzDHmvDZalf9KEAJ3NdZVjH7ra-SmHoR1jAXDnSJtq4w-RWxfXhql918CbUdya1M6CrKHBc7zezO_OUv-yIvTHPgrf4WVM7nsN7BqP0v4IXwIBpQQsThOykKySOxeAxclnOq7tZj6JCtXAqdDpDKrNm8dW9eUVUs6FRr-Cyzy4kqBDOil73gf1eSQAPxCfk5GLe04EEunRa-RCAu4ECXhYGYqVerh-4BWkLQQSe6AmdKmzZy4yVwg"/>
            <img alt="Yoga 1" class="w-full h-full object-cover rounded-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjynXaNTqFQ2Tdja98mTQRYhiIB0mdI1k13oJkL7bVabZUJD923aQNInH6cqGVa3_arwu4mj6Jj03PpvFQ-BDXvqBYKrNs_qc-mMe1y9z5MPDYc-qUj4EUBCa7pxJexVIHGFiB5DaERycaLYwlZ-XdLX8u0ftdJBZgoG-xrtDItGnp6uMjQJ1OQ05zquPJDmG4Vl-jFsuca0vMoYQW34T4swHJkxLyqJ5FgB2LWLGGCaBng9Uft8cFPT7XBw1lAc5Fza9SJTsL364"/>
            <img alt="Coast 1" class="w-full h-full object-cover rounded-2xl" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmIGsbMQq2tUqfQdyNxmTc8MTVgUyfoIAnwZsv4GReBjgHmMc3XmjXfj9Ly4J3j4cWHNW76mEb9-_lvezQHQQFrXcemxvLnITcY4T5EDDZRRzncCBQGdJjKzGSsmpEmWOFHlQ07XvYtxJMSeQoEvgjP-Q65ovrN2ozDQ-osK0zIZuSiFEMHH8bo0odhYHIeEed-6shd4rfFAVaNreLKpZ3QXej5306-uLo6t0qWwK46QQEsi_3Q2o975J6FTmR1txiKa49FG5XjNA"/>
        </div>
        <div class="lg:w-1/2 p-12 md:p-24 flex flex-col justify-center">
            <span class="text-primary font-extrabold tracking-[0.3em] uppercase text-xs mb-6 block">The Advantage</span>
            <h2 class="text-4xl md:text-6xl font-extrabold mb-10 uppercase leading-tight tracking-tighter">Why Choose Us?</h2>
            <div class="space-y-10">
                <div class="flex items-start space-x-6">
                    <div class="bg-primary/10 p-4 rounded-2xl text-primary border border-primary/20">
                        <svg class="lucide lucide-shield" fill="none" height="28" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-extrabold mb-2 uppercase tracking-wide">Top Equipment</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">We provide premium boards and gear from world-renowned brands.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-6">
                    <div class="bg-primary/10 p-4 rounded-2xl text-primary border border-primary/20">
                        <svg class="lucide lucide-users" fill="none" height="28" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-extrabold mb-2 uppercase tracking-wide">Expert Coaches</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">Certified professionals dedicated to your growth and safety.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-6">
                    <div class="bg-primary/10 p-4 rounded-2xl text-primary border border-primary/20">
                        <svg class="lucide lucide-lotus" fill="none" height="28" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg"><path d="M12 3c1.4 0 2.8 1.1 3.5 2.5 1.1 2.1 1.1 4.5 0 6.5C14.8 13.4 13.4 14.5 12 14.5s-2.8-1.1-3.5-2.5c-1.1-2.1-1.1-4.5 0-6.5C9.2 4.1 10.6 3 12 3Z"></path><path d="M10.7 7.7c-1.9-1.3-4.5-1.3-6.4 0-1.9 1.3-1.9 3.8 0 5.1s4.5 1.3 6.4 0"></path><path d="M13.3 7.7c1.9-1.3 4.5-1.3 6.4 0 1.9 1.3 1.9 3.8 0 5.1s-4.5 1.3-6.4 0"></path><path d="M12 14.5v6"></path><path d="M9 21h6"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-extrabold mb-2 uppercase tracking-wide">Daily Yoga</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">Recover and find balance with guided sunset yoga sessions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Why Choose Us Section -->

    <!-- BEGIN: Best Surf Spots Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 text-center mb-16">
            <span class="text-primary font-extrabold tracking-widest uppercase text-xs mb-4 block">Legendary Waves</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal uppercase tracking-tighter">Best Surf Spots</h2>
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-6 h-[800px]">
            <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-3xl">
                <img alt="Anchor Point" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeQFQ1aF-M7Zh5Ab3bejvGla-F9MVoBZaZce_MhkIQyw-WhMx84YF7xG9dnrRQxwHwqjpNMzwreldYLdiTMM8zJAA6LeCvNY56ZLTx1GNZj1Yfa8ak-oBmokryJod4yuwKhdjleBvo54huQpaYWyHKuWmlTOVRI_LC7I7E3QOAyjf53VUMmrRR56UVmZ0K5fpBMIrLt56us4DDknvd2crFl-woHzki00wqN8BDw6GVtyY3fK6QWm7ZiShkvzyfnx3o8EzojEk_C2k"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-10">
                    <span class="text-primary text-xs font-black uppercase tracking-widest mb-2">Iconic</span>
                    <h3 class="text-4xl font-black text-white uppercase italic">Anchor Point</h3>
                </div>
            </div>
            <div class="md:col-span-2 relative group overflow-hidden rounded-3xl">
                <img alt="Killer Point" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXr2N1NCjPUHyAf1cIU3vJ6Ydd_lFB10aqg9_IRPNuR-n5PVHKW6cMMjtaEsE9NltXZpaFM3hCa72k8BY-HYZzzKjGoKIqgoyy9VIkz5ns5iBg9a8P1yikPsx0yW9tRWbR9Ikq3TZ-ZC1Q8fRiD3vCyTmQb6H0uFi00gx8IffQg-HJVF766svB8HwE2k-9IIWjvyTL_7ojYR1Tz19VYo5Zu_f_W-EK1oMex2e1MyEV-wc0D1X_hOHcHU4V3YLy8K5mNMIA2uw9TsU"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-2xl font-black text-white uppercase italic">Killer Point</h3>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-3xl">
                <img alt="Banana Beach" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAylc4LszKUW8xmgPU02JEcDVnbM7mRvS4iGumItL9liNUtYv4783vWTFA3I5ZxRe2gzcyUas5h8IfUWXrXSliCRMBbT83zv3AHyhsv-Uify4N-FgIVR_jl_l9BisFByLiD-LyRhJNc9uLozc1EtCx4tdBS2ikG5hTJx7lhyfRqejh85p1uopVTdKzU9e_Hc1OXmwr9D1idoPiY74mi9K7zUctzX_crgjx4iDXbRMA5bEl8EegGdmEbPQ_VUS_ZevrJoYewqUBmNE"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                    <h4 class="text-lg font-black text-white uppercase italic">Banana Beach</h4>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-3xl">
                <img alt="Devil's Rock" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPppn0Cn1yYv6rWvkN1fVn-VXRUgTUHZJ_jGqt_ZVvU5lLFwfcLeXBuIF4LK2nGyAVVKebOZkgOSzlXB-P-SeA3Q_wAFK6ANEmUA5MFEcK3UOqcfGf1f7RveOWIh-GAcVxFyFbXqYWGuSU13TE7xIx7cKaDK9i6z0aIU5O1LGazOm2kpsXkk6HDWsv1aFbzD-dfGogSfodao8bkD9HG4T3pzxI199g_Z79K7Y2ANfvvojen5g5dPf-4ZFZ3Rv9hzSivbpVjJ4FXDc"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                    <h4 class="text-lg font-black text-white uppercase italic">Devil's Rock</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Best Surf Spots Section -->

    <!-- BEGIN: Video Promo Section -->
    <section class="relative h-[650px] flex items-center justify-center text-center overflow-hidden bg-darkCharcoal">
        <div class="absolute inset-0 z-0">
            <img alt="Action video bg" class="w-full h-full object-cover opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAui7Sfk6GhIE9YWPSoUi8cp9MSfVqzF8vtS-P25KixdKYiLEAL1DfQjZtrqiSNCJuDCemBePIqf3OU5Yjh_t1plGRoVupG0ZSvuPXmIix_LRR_6zbpxvitv1EdOnogVRyVyOtnIino2_lNAfAfOvx5M2ywnWHp9oqGisyYkMdK3ZRZQTMpzUkHXUhV17i6xLSOAPGTfOp16F1I5bLpSuu35MSofF3nJVYwRWFSe2xialStnZVX_JA8to5wqrVVr_9P_jDRFGDn9iQ"/>
        </div>
        <div class="relative z-10 container mx-auto px-6 text-white max-w-5xl">
            <div class="flex justify-center mb-12">
                <button class="w-24 h-24 bg-primary rounded-full flex items-center justify-center hover:bg-white hover:text-primary transition-all shadow-[0_0_50px_rgba(0,174,239,0.5)] group">
                    <svg fill="currentColor" height="40" viewbox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                </button>
            </div>
            <span class="text-primary font-black tracking-[0.4em] uppercase text-xs mb-6 block">Ready to start?</span>
            <h2 class="text-4xl md:text-6xl font-black mb-16 uppercase leading-tight tracking-tighter">Don't miss this opportunity to join a camp that offers everything you need</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                <div class="flex flex-col items-center group cursor-default">
                    <div class="mb-4 text-primary group-hover:scale-110 transition-transform">
                        <svg class="lucide lucide-skateboard" fill="none" height="40" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><path d="M18 11V8a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v3"></path><circle cx="7" cy="17" r="2"></circle><circle cx="17" cy="17" r="2"></circle><path d="M2 11h20"></path></svg>
                    </div>
                    <span class="text-[10px] uppercase font-black tracking-widest text-gray-300">Skate Lessons</span>
                </div>
                <div class="flex flex-col items-center group cursor-default">
                    <div class="mb-4 text-primary group-hover:scale-110 transition-transform">
                        <svg class="lucide lucide-flower-2" fill="none" height="40" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m9.1 16.5-4.6-4.6a2 2 0 0 1 0-2.8l4.6-4.6a2 2 0 0 1 2.8 0l4.6 4.6a2 2 0 0 1 0 2.8l-4.6 4.6a2 2 0 0 1-2.8 0Z"></path><path d="M9 12a3 3 0 1 0 6 0 3 3 0 0 0-6 0Z"></path><path d="M12 15v6"></path><path d="m15 18-3 3-3-3"></path></svg>
                    </div>
                    <span class="text-[10px] uppercase font-black tracking-widest text-gray-300">Yoga Sessions</span>
                </div>
                <div class="flex flex-col items-center group cursor-default">
                    <div class="mb-4 text-primary group-hover:scale-110 transition-transform">
                        <svg class="lucide lucide-navigation" fill="none" height="40" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                    </div>
                    <span class="text-[10px] uppercase font-black tracking-widest text-gray-300">Surf Guiding</span>
                </div>
                <div class="flex flex-col items-center group cursor-default">
                    <div class="mb-4 text-primary group-hover:scale-110 transition-transform">
                        <svg class="lucide lucide-utensils" fill="none" height="40" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"></path><path d="M7 2v20"></path><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"></path></svg>
                    </div>
                    <span class="text-[10px] uppercase font-black tracking-widest text-gray-300">Gourmet Food</span>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Video Promo Section -->

    <!-- BEGIN: Extra Activities Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 text-center mb-16">
            <span class="text-primary font-extrabold tracking-widest uppercase text-xs mb-4 block">Beyond the Board</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal uppercase tracking-tighter">Extra Activities</h2>
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($activities as $activity)
                <!-- Activity Card -->
                <div class="group relative overflow-hidden rounded-3xl h-80 shadow-lg">
                    <img alt="{{ $activity->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkpUtQ_YkAYqto0L-7wu5_Qt-a7mk8-S7Ottl7CqG-xsMLHUFS3HaORu_EhUkxzjI7lEV9TpXvwkn6xRLzfrFP1YIyUuIsC6mR6um5ue2ai6iI1f40z_EuiKdHtwBFo4rDpTMaYhSCdfs0h648N2ttLDLzABJUUyQsTLvrmI-Z5MCfTaM0mF13CxoGWRd6HmIWK9lmLfXX0B1lVyLyb_2aqjFWMDaXiGwrDW_pM_LOwqLBp9kjYYFqRUuXV1dYu-MVyk1OHxmcGLY"/>
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <h4 class="text-xl font-black uppercase italic tracking-wider">{{ $activity->name }}</h4>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">No activities available</div>
            @endforelse
        </div>
    </section>
    <!-- END: Extra Activities Section -->

    <!-- Review Modal Component -->
    @auth
        <x-review-modal />
    @endauth

    <!-- BEGIN: News & Articles Section -->
    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6 flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="mb-8 md:mb-0">
                <span class="text-primary font-extrabold tracking-widest uppercase text-xs mb-4 block">Our Journal</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-darkCharcoal uppercase tracking-tighter">News & Articles</h2>
            </div>
            <a class="bg-primary hover:bg-darkCharcoal text-white font-black px-10 py-4 rounded-full uppercase text-[10px] tracking-widest transition-all shadow-lg" href="#">Read All Posts</a>
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Article 1 -->
            <article class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                <div class="relative h-64 overflow-hidden">
                    <img alt="Blog 1" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYpwFbwrUHfLgU_NjGNypsSm8Y8emiDK_ZPW76Qq_honcO2fUYQE63UkXUB-7fhUW-dMic92PuGgmvHO4JRkcnLjLjmFINfaHavdwpQQCmLpo9U86WhW0tvfxu6S5OKdtrnqyzn7LHnvBLtzmY1uGbC3XMSOxiUv9K843hK020UpS0CcjMmBhg77xZd5-GkOiSVC5BBdrEMuSArScBMGUbM0_63DlH0rchC0xs4CgF-d5D3hXb_ojiTSDZttSVHc5Jr9o6DE-R2y8"/>
                    <div class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase">Lifestyle</div>
                </div>
                <div class="p-10">
                    <div class="text-[10px] text-gray-400 font-black uppercase mb-4 tracking-widest">October 08, 2024</div>
                    <h3 class="text-xl font-black mb-6 uppercase leading-tight group-hover:text-primary transition-colors">🇲🇦 Moroccan Culture & Surf Lifestyle – What to Expect</h3>
                    <a class="text-primary font-black text-[10px] uppercase tracking-widest border-b-2 border-primary/20 pb-1 hover:border-primary transition-all" href="#">Explore More</a>
                </div>
            </article>
            <!-- Article 2 -->
            <article class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                <div class="relative h-64 overflow-hidden">
                    <img alt="Blog 2" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAKelqdHr0g3YFEUMBsYGgyncQ7N0r_cunNdgHTfMd4OamgoZu19B9bBbcG8z4pFRwRK-At1nb4-A7_oJVcovxGPQj42OQWfzQNGqUFAnm6x1WUXHEKxORuwgXaJTQtvSde4OzhAragjNuKBDKhObjNEMJHxfLlGEjEPP7oDHQ1XGjxOoJB2-hCHvyMjr_F_KGWzT-YMvDlaLULE3VJYzyJZJFkwYIYxE1RfGifGPazglWILxRRu6NMSwkmsAFU4TquzVfMiKbSR4"/>
                    <div class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase">Training</div>
                </div>
                <div class="p-10">
                    <div class="text-[10px] text-gray-400 font-black uppercase mb-4 tracking-widest">October 06, 2024</div>
                    <h3 class="text-xl font-black mb-6 uppercase leading-tight group-hover:text-primary transition-colors">🏄‍♂️ Top 12 Surf Spots Near Surf Skate Camp</h3>
                    <a class="text-primary font-black text-[10px] uppercase tracking-widest border-b-2 border-primary/20 pb-1 hover:border-primary transition-all" href="#">Explore More</a>
                </div>
            </article>
            <!-- Article 3 -->
            <article class="bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                <div class="relative h-64 overflow-hidden">
                    <img alt="Blog 3" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHCzXypI3j3WTll2-zwCcaepQ8PpCDV1AYvCLrkW7BLHkgmTISAL3L8hlxNhqNWbfqOm-ABqhhfO3RlIPOU_zJRluAu7qptMZrKk1gDG6NLHAzrvB6F6S-9UuvO5emm4zUUEDOsqzQcOGK-zKfuPJPzzsxVAgbBOeMEtavH0jvdD-MEMM-vjp-w57TBLBGFdmFEiUQo-CYmnqRZN_O2gCeABYzsdV29qj0nsa7H0cHUgi_pJfS0HaoTwB5eFNneZEoHQPtbHo7qJA"/>
                    <div class="absolute top-6 left-6 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase">Skate</div>
                </div>
                <div class="p-10">
                    <div class="text-[10px] text-gray-400 font-black uppercase mb-4 tracking-widest">October 04, 2024</div>
                    <h3 class="text-xl font-black mb-6 uppercase leading-tight group-hover:text-primary transition-colors">🛹 Why Surf Skate is the Best Training for Surfers</h3>
                    <a class="text-primary font-black text-[10px] uppercase tracking-widest border-b-2 border-primary/20 pb-1 hover:border-primary transition-all" href="#">Explore More</a>
                </div>
            </article>
        </div>
    </section>
    <!-- END: News & Articles Section -->
@endsection
