<header x-data="{ atTop: true }" @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
        :class="{ 'bg-white/80 backdrop-blur-md py-3 shadow-sm': !atTop, 'bg-transparent py-6': atTop }"
        class="fixed w-full z-50 transition-all duration-500 ease-in-out">
    <div class="max-container flex justify-between items-center px-6 lg:px-12">
        
        <a href="{{ route('home') }}" class="block">
            <img src="{{ asset('img/logo.jpg') }}" 
                 alt="Luís Belo" 
                 :class="{ 'brightness-50 mix-blend-multiply': !atTop, 'brightness-0 invert': atTop }"
                 class="h-12 w-auto transition-all duration-500 object-contain">
        </a>

        <nav class="hidden md:flex items-center space-x-12">
            @php
                $navLinks = [
                    ['name' => 'Início', 'route' => 'home'],
                    ['name' => 'Imóveis', 'route' => 'portfolio'],
                    ['name' => 'Sobre', 'route' => 'about'],
                    ['name' => 'Contacto', 'route' => 'contact']
                ];
            @endphp

            @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}" 
                   :class="{ 'text-slate-700 hover:text-slate-900': !atTop, 'text-white/90 hover:text-white': atTop }"
                   class="text-[10px] uppercase tracking-[0.3em] font-medium transition-all duration-300 relative group">
                    {{ $link['name'] }}
                    <span class="absolute -bottom-1 left-0 w-0 h-px bg-current transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </nav>

        <div class="md:hidden">
            <button class="focus:outline-none transition-colors duration-500" :class="atTop ? 'text-white' : 'text-slate-900'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h16M4 16h16" />
                </svg>
            </button>
        </div>
    </div>
</header>