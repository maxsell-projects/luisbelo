<header x-data="{ atTop: true, mobileMenuOpen: false }" @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
        :class="{ 'bg-white/80 backdrop-blur-md py-3 shadow-sm': !atTop && !mobileMenuOpen, 'bg-transparent py-6': atTop, 'bg-slate-900': mobileMenuOpen }"
        class="fixed w-full z-50 transition-all duration-500 ease-in-out">
    
    @php
        $navLinks = [
            ['name' => 'Início', 'route' => 'home'],
            ['name' => 'Imóveis', 'route' => 'portfolio'],
            ['name' => 'Sobre', 'route' => 'about'],
            ['name' => 'Contacto', 'route' => 'contact']
        ];
    @endphp

    <div class="max-container flex justify-between items-center px-6 lg:px-12">
        
        <a href="{{ route('home') }}" class="block relative z-50">
            <img src="{{ asset('img/logo.jpg') }}" 
                 alt="Luís Belo" 
                 :class="{ 'brightness-50 mix-blend-multiply': !atTop && !mobileMenuOpen, 'brightness-0 invert': atTop || mobileMenuOpen }"
                 class="h-12 w-auto transition-all duration-500 object-contain">
        </a>

        <nav class="hidden md:flex items-center space-x-12">
            @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}" 
                   :class="{ 'text-slate-700 hover:text-slate-900': !atTop, 'text-white/90 hover:text-white': atTop }"
                   class="text-[10px] uppercase tracking-[0.3em] font-medium transition-all duration-300 relative group">
                    {{ $link['name'] }}
                    <span class="absolute -bottom-1 left-0 w-0 h-px bg-current transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </nav>

        <div class="md:hidden relative z-50">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="focus:outline-none transition-colors duration-500" :class="(atTop || mobileMenuOpen) ? 'text-white' : 'text-slate-900'">
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h16M4 16h16" />
                </svg>
                <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-full"
         class="fixed inset-0 bg-slate-900 z-40 flex items-center justify-center md:hidden"
         style="display: none;">
        <nav class="flex flex-col items-center space-y-8">
            @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}" 
                   class="text-2xl text-white font-serif italic tracking-wide hover:text-white/70 transition-colors">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>