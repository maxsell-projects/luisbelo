<header x-data="{ atTop: true }" @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)"
        :class="{ 'bg-white/80 backdrop-blur-md py-3 shadow-sm': !atTop, 'bg-transparent py-6': atTop }"
        class="fixed w-full z-50 transition-all duration-500">
    <div class="max-container flex justify-between items-center px-12">
        <a href="/" class="text-2xl font-serif tracking-widest uppercase" :class="atTop ? 'text-white' : 'text-slate-900'">
            LUÍS<span class="font-light text-slate-400">BELO</span>
        </a>
        <nav class="hidden md:flex space-x-12">
            @foreach(['home' => 'Início', 'portfolio' => 'Imóveis', 'about' => 'Sobre', 'contact' => 'Contacto'] as $route => $label)
                <a href="{{ route($route) }}" class="text-[10px] uppercase tracking-[0.3em]" :class="atTop ? 'text-white/80' : 'text-slate-600'">{{ $label }}</a>
            @endforeach
        </nav>
    </div>
</header>