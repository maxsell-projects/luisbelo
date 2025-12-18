@extends('layouts.app')

@section('title', $property->title . ' | Luís Belo')

@section('content')
<section class="relative h-[80vh] w-full overflow-hidden bg-slate-900">
    <img src="{{ asset('storage/' . $property->cover_image) }}" 
         class="w-full h-full object-cover opacity-80 animate__animated animate__fadeIn" 
         alt="{{ $property->title }}">
    <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent"></div>
    
    <div class="absolute bottom-20 left-0 w-full">
        <div class="max-container px-6 lg:px-12">
            <div class="max-w-4xl space-y-6 animate__animated animate__fadeInUp">
                <span class="text-[10px] uppercase tracking-[0.6em] text-slate-500 font-bold block">
                    {{ $property->type }} • {{ $property->city }}
                </span>
                <h1 class="text-5xl md:text-7xl font-serif text-slate-900 leading-tight">
                    {{ $property->title }}
                </h1>
                <p class="text-2xl font-serif text-slate-400 italic">
                    {{ number_format($property->price, 0, ',', '.') }}€
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-white border-b border-slate-100">
    <div class="max-container px-6 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-slate-400 block">Área Útil</span>
                <span class="text-lg font-serif text-slate-900">{{ (int)$property->area_useful }} m²</span>
            </div>
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-slate-400 block">Quartos</span>
                <span class="text-lg font-serif text-slate-900">{{ $property->bedrooms }} Suites</span>
            </div>
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-slate-400 block">Casas de Banho</span>
                <span class="text-lg font-serif text-slate-900">{{ $property->bathrooms }}</span>
            </div>
            <div class="space-y-1">
                <span class="text-[9px] uppercase tracking-widest text-slate-400 block">Certificação</span>
                <span class="text-lg font-serif text-slate-900">{{ $property->energy_rating ?? 'A' }}</span>
            </div>
        </div>
    </div>
</section>

<section class="py-32 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-24">
            
            <div class="w-full lg:w-5/12 space-y-12">
                <div class="space-y-6">
                    <h2 class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-bold">A Propriedade</h2>
                    <div class="prose prose-slate prose-lg font-light leading-relaxed text-slate-500 italic">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                </div>

                <div class="pt-12 border-t border-slate-100">
                    <h3 class="text-[10px] uppercase tracking-[0.5em] text-slate-900 font-bold mb-8">Comodidades</h3>
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        @php
                            $features = [
                                'has_pool' => 'Piscina Privada',
                                'has_garden' => 'Jardim Paisagístico',
                                'has_lift' => 'Elevador',
                                'has_terrace' => 'Terraço Panorâmico',
                                'has_air_conditioning' => 'Climatização Central',
                                'is_furnished' => 'Mobilado (Curadoria)',
                                'is_kitchen_equipped' => 'Cozinha Gourmet'
                            ];
                        @endphp
                        @foreach($features as $key => $label)
                            @if($property->$key)
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-1.5 rounded-full bg-slate-900"></div>
                                    <span class="text-[10px] uppercase tracking-widest text-slate-600">{{ $label }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="pt-12">
                    <a href="https://wa.me/{{ $property->whatsapp_number ?? '351912345678' }}" 
                       class="block w-full py-6 bg-slate-900 text-white text-center text-[11px] uppercase tracking-[0.4em] font-bold hover:bg-slate-800 transition-all shadow-xl">
                        Solicitar Dossier Privado
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-7/12 space-y-12">
                <div class="grid grid-cols-12 gap-6">
                    @foreach($property->images as $index => $image)
                        <div class="{{ $index % 3 == 0 ? 'col-span-12' : 'col-span-6' }} overflow-hidden">
                            <img src="{{ asset('storage/' . $image->path) }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-1000 cursor-zoom-in" 
                                 alt="Detalhe {{ $index }}">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-40 bg-slate-50">
    <div class="max-container px-6 lg:px-12 text-center">
        <div class="max-w-2xl mx-auto space-y-12">
            <h2 class="text-4xl md:text-5xl font-serif leading-tight text-slate-900">
                Interessado nesta <br><span class="italic text-slate-400">oportunidade única?</span>
            </h2>
            <p class="text-slate-500 font-light text-lg italic">
                Agende uma visita privada ou solicite mais informações sobre esta propriedade exclusiva.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-8 pt-6">
                <a href="{{ route('contact') }}" class="px-12 py-5 border border-slate-900 text-slate-900 text-[10px] uppercase tracking-[0.3em] font-bold hover:bg-slate-900 hover:text-white transition-all">
                    Enviar Mensagem
                </a>
            </div>
        </div>
    </div>
</section>
@endsection