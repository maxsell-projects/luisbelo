@extends('layouts.app')

@section('title', $property->title . ' | Luís Belo')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="pt-32 pb-24 bg-white">
    <div class="max-container px-6 lg:px-12">
        
        {{-- CABEÇALHO EDITORIAL --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-12" data-aos="fade-up">
            <div class="max-w-4xl space-y-4">
                <div class="flex items-center gap-4">
                    <span class="text-[10px] uppercase tracking-[0.4em] text-slate-400 font-black px-4 py-1.5 border border-slate-100 rounded-full">
                        {{ $property->type }}
                    </span>
                    <span class="text-[10px] uppercase tracking-[0.4em] text-slate-900 font-black px-4 py-1.5 bg-slate-50 rounded-full">
                        {{ $property->status }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-serif text-slate-900 leading-[1.1]">
                    {{ $property->title }}
                </h1>
                <p class="text-slate-400 font-light flex items-center gap-3 text-xl italic font-serif">
                    <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    {{ $property->location }} {{ $property->city ? '• ' . $property->city : '' }}
                </p>
            </div>
            
            <div class="text-right hidden md:block">
                <p class="text-[9px] uppercase tracking-[0.5em] text-slate-300 mb-1 font-bold">Referência Privada</p>
                <p class="text-2xl font-serif text-slate-900 italic">#{{ $property->id + 1000 }}</p>
            </div>
        </div>

        {{-- CARROSSEL PREMIUM (TOPO) --}}
        <div class="relative rounded-sm overflow-hidden bg-slate-900 group mb-20 h-[60vh] md:h-[80vh]" data-aos="zoom-in">
            <div class="swiper propertySwiper h-full w-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9' }}" 
                             class="w-full h-full object-cover opacity-80" alt="{{ $property->title }}">
                    </div>
                    @foreach($property->images as $img)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $img->path) }}" class="w-full h-full object-cover opacity-80" alt="Galeria">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next !text-white !right-10 after:!text-xl opacity-0 group-hover:opacity-100 transition-all"></div>
                <div class="swiper-button-prev !text-white !left-10 after:!text-xl opacity-0 group-hover:opacity-100 transition-all"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent pointer-events-none z-10"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 relative">
            
            <div class="lg:col-span-7 space-y-20">
                
                {{-- GRID DE ESPECIFICAÇÕES (ESCURECIDA) --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-1 bg-slate-900 p-1 border border-slate-800 shadow-2xl">
                    <div class="bg-slate-900 p-8 text-center border border-slate-800/50">
                        <span class="block text-2xl font-serif text-white mb-1">{{ $property->bedrooms ?? '-' }}</span>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-slate-500 font-bold">Suítes</span>
                    </div>
                    <div class="bg-slate-900 p-8 text-center border border-slate-800/50">
                        <span class="block text-2xl font-serif text-white mb-1">{{ $property->bathrooms ?? '-' }}</span>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-slate-500 font-bold">Banhos</span>
                    </div>
                    <div class="bg-slate-900 p-8 text-center border border-slate-800/50">
                        <span class="block text-2xl font-serif text-white mb-1">{{ number_format($property->area_gross ?? 0, 0) }}</span>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-slate-500 font-bold">m² Área</span>
                    </div>
                    <div class="bg-slate-900 p-8 text-center border border-slate-800/50">
                        <span class="block text-2xl font-serif text-white mb-1">{{ $property->energy_rating ?? 'A' }}</span>
                        <span class="text-[9px] uppercase tracking-[0.3em] text-slate-500 font-bold">Certificação</span>
                    </div>
                </div>

                {{-- NARRATIVA --}}
                <div class="space-y-8">
                    <h3 class="text-[11px] uppercase tracking-[0.5em] text-slate-300 font-black italic">Narrativa da Propriedade</h3>
                    <div class="prose prose-xl prose-slate text-slate-600 font-light leading-relaxed italic max-w-none">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                </div>

                {{-- CARACTERÍSTICAS --}}
                <div class="pt-16 border-t border-slate-50">
                    <h3 class="text-[11px] uppercase tracking-[0.5em] text-slate-900 font-black mb-12">Destaques Curados</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                        @php
                            $features = [
                                'has_pool' => 'Piscina Privada',
                                'has_garden' => 'Jardim Paisagístico',
                                'has_lift' => 'Elevador Privativo',
                                'has_terrace' => 'Terraço Panorâmico',
                                'has_air_conditioning' => 'Climatização Central',
                                'is_furnished' => 'Curadoria de Mobiliário',
                                'is_kitchen_equipped' => 'Cozinha Gourmet'
                            ];
                        @endphp
                        @foreach($features as $key => $label)
                            @if($property->$key)
                                <div class="flex items-center justify-between py-4 border-b border-slate-50 group">
                                    <span class="text-slate-500 font-medium text-[11px] uppercase tracking-widest group-hover:text-slate-900 transition-colors">{{ $label }}</span>
                                    <div class="w-1.5 h-1.5 bg-slate-900 rounded-full"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- VÍDEO TOUR --}}
                @if($property->video_url)
                    <div class="bg-slate-950 p-2 rounded-sm shadow-2xl relative overflow-hidden group">
                        @php
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $property->video_url, $match);
                            $youtube_id = $match[1] ?? null;
                        @endphp

                        @if($youtube_id)
                            <div class="relative w-full aspect-video overflow-hidden">
                                <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}?modestbranding=1&rel=0&iv_load_policy=3" 
                                        frameborder="0" allowfullscreen class="absolute inset-0 w-full h-full opacity-80 group-hover:opacity-100 transition-opacity"></iframe>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            {{-- SIDEBAR DE INVESTIMENTO (STICKY) --}}
            <div class="lg:col-span-5">
                <div class="lg:sticky lg:top-40 space-y-8">
                    
                    <div class="bg-slate-50 p-12 border border-slate-100 shadow-sm text-center space-y-8">
                        <div>
                            <p class="text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-3 font-bold">Valor de Investimento</p>
                            <p class="text-4xl font-serif text-slate-900 italic">
                                {{ $property->price ? number_format($property->price, 0, ',', '.') . ' €' : 'Sob Consulta' }}
                            </p>
                        </div>
                        
                        <div class="w-12 h-px bg-slate-200 mx-auto"></div>

                        <p class="text-xs text-slate-400 font-light leading-relaxed italic px-4">
                            Aceda ao dossier completo e agende uma consultoria privada para esta propriedade.
                        </p>

                        <div class="space-y-4">
                            <a href="https://wa.me/{{ $property->whatsapp_number ?? '351912345678' }}" 
                               class="group relative block w-full py-6 bg-slate-900 overflow-hidden text-center transition-all duration-500 shadow-xl">
                                <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.4em] font-bold">Solicitar Dossier Privado</span>
                                <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                            </a>

                            <a href="{{ route('contact') }}" class="block text-[10px] uppercase tracking-widest font-black text-slate-400 hover:text-slate-900 transition-colors py-2">
                                Agendar via Protocolo
                            </a>
                        </div>

                        <div class="pt-8 border-t border-slate-100">
                            <p class="text-[9px] uppercase tracking-[0.3em] text-slate-300 mb-4 font-bold">Partilha Privada</p>
                            <div class="flex justify-center gap-8">
                                <a href="#" class="text-slate-400 hover:text-slate-900 transition-colors"><small class="uppercase tracking-widest font-bold">LinkedIn</small></a>
                                <a href="#" class="text-slate-400 hover:text-slate-900 transition-colors"><small class="uppercase tracking-widest font-bold">Email</small></a>
                            </div>
                        </div>
                    </div>

                    {{-- BADGE DE GARANTIA --}}
                    <div class="p-8 border border-dashed border-slate-200 text-center">
                        <p class="text-[10px] uppercase tracking-[0.4em] text-slate-300 font-bold leading-relaxed">
                            Transação Garantida por <br> Luís Belo Real Estate
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".propertySwiper", {
        loop: true,
        speed: 1200,
        effect: "fade",
        fadeEffect: { crossFade: true },
        autoplay: { delay: 5000 },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    });
</script>
@endsection