@extends('layouts.app')

@section('title', 'Luís Belo | Real Estate Agent | Propriedades Exclusivas')

@section('content')
<section class="relative h-screen w-full flex items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
             class="w-full h-full object-cover opacity-50 scale-110 animate-[ken-burns_30s_ease-in-out_infinite]" 
             alt="Luxury Estate">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-transparent to-slate-900"></div>
    </div>

    <div class="relative z-10 text-center px-6">
        <div class="overflow-hidden mb-4">
            <span class="block text-white/60 uppercase tracking-[0.8em] text-[10px] md:text-xs animate__animated animate__fadeInUp">
                Lisboa • Cascais • Algarve
            </span>
        </div>
        
        <h1 class="text-7xl md:text-[12rem] text-white font-serif mb-0 tracking-tighter leading-none animate__animated animate__fadeInUp animate__delay-1s">
            Luís Belo
        </h1>
        
        <div class="overflow-hidden">
            <span class="block text-xl md:text-3xl font-light italic text-white/80 font-serif animate__animated animate__fadeInUp animate__delay-2s">
                Real Estate Agent
            </span>
        </div>

        <div class="mt-16 flex justify-center animate__animated animate__fadeIn animate__delay-3s">
            <a href="#explore" class="group flex flex-col items-center gap-4">
                <span class="text-[10px] uppercase tracking-[0.4em] text-white/40 group-hover:text-white transition-colors">Descobrir</span>
                <div class="w-px h-16 bg-gradient-to-b from-white/40 to-transparent"></div>
            </a>
        </div>
    </div>
</section>

<section id="explore" class="relative py-40 bg-white overflow-hidden">
    <div class="max-container px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-32 items-center">
            <div class="w-full lg:w-1/2 relative" data-aos="fade-right">
                <div class="absolute -top-24 -left-12 text-[20rem] font-serif text-slate-50 select-none z-0">LB</div>
                <div class="relative z-10 space-y-12">
                    <h2 class="text-6xl md:text-7xl font-serif text-slate-900 leading-[1.05]">
                        A curadoria do <br><span class="italic text-slate-400">invisível.</span>
                    </h2>
                    <div class="w-20 h-px bg-slate-900"></div>
                    <p class="text-slate-500 font-light leading-relaxed text-xl max-w-md">
                        No mercado de alto padrão, as melhores oportunidades não são anunciadas. Elas são sussurradas. Luís Belo oferece acesso ao mercado "Off-Market" com total discrição.
                    </p>
                    <div class="pt-6">
                        <a href="{{ route('about') }}" class="group inline-flex items-center gap-6 text-[11px] uppercase tracking-[0.3em] font-bold text-slate-900">
                            A Nossa Identidade
                            <div class="relative w-12 h-px bg-slate-300 overflow-hidden">
                                <div class="absolute inset-0 bg-slate-900 -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2" data-aos="fade-left" data-aos-delay="200">
                <div class="relative">
                    <div class="aspect-[4/5] overflow-hidden shadow-2xl">
                        <img src="{{ asset('img/photo.jpg') }}" 
                             class="w-full h-full object-cover scale-110" alt="Luxury Interior">
                    </div>
                    <div class="absolute -bottom-12 -left-12 bg-slate-900 p-12 hidden md:block" data-aos="fade-up" data-aos-delay="400">
                        <p class="text-white font-serif italic text-2xl leading-tight">
                            "Excelência é <br> o nosso padrão."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative h-[60vh] flex items-center justify-center overflow-hidden" data-aos="fade">
    <div class="absolute inset-0 bg-slate-900">
        <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6eb3c?auto=format&fit=crop&w=1920&q=80" 
             class="w-full h-full object-cover opacity-30 fixed" alt="Background">
    </div>
    <div class="relative z-10 text-center px-6" data-aos="zoom-in">
        <h2 class="text-3xl md:text-5xl font-serif text-white italic max-w-4xl leading-relaxed">
            "Para quem entende que uma casa não é apenas um endereço, mas a moldura de uma vida bem vivida."
        </h2>
    </div>
</section>

<section class="py-40 bg-slate-50">
    <div class="max-container px-6 lg:px-12">
        <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-8" data-aos="fade-up">
            <div class="space-y-4">
                <span class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-bold">Portfólio Privado</span>
                <h2 class="text-5xl font-serif text-slate-900">Propriedades em Destaque</h2>
            </div>
            <a href="{{ route('portfolio') }}" class="text-[11px] uppercase tracking-[0.2em] font-bold border-b-2 border-slate-200 pb-2 hover:border-slate-900 transition-all">
                Ver Todas as Propriedades
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-24">
            @forelse($properties as $index => $property)
                <div class="group relative overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                    <div class="aspect-[16/10] overflow-hidden mb-8">
                        <img src="{{ asset('storage/' . $property->cover_image) }}" 
                             class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" 
                             alt="{{ $property->title }}">
                    </div>
                    <div class="flex justify-between items-start">
                        <div class="space-y-2">
                            <h4 class="text-2xl font-serif text-slate-900">{{ $property->title }}</h4>
                            <p class="text-sm text-slate-500 font-light tracking-wide italic">
                                {{ $property->city }}, {{ $property->location }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-serif text-slate-900">{{ number_format($property->price, 0, ',', '.') }}€</p>
                            <a href="{{ route('properties.show', $property->slug) }}" 
                               class="text-[9px] uppercase tracking-[0.3em] font-black text-slate-400 group-hover:text-slate-900 transition-colors">
                                Explorar →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-2 text-center text-slate-400 italic">Curadoria exclusiva em andamento.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection