@extends('layouts.app')

@section('title', 'Coleção de Propriedades | Luís Belo')

@section('content')
<section class="relative pt-48 pb-20 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="max-w-3xl" data-aos="fade-up">
            <span class="text-[10px] uppercase tracking-[0.6em] text-slate-400 font-bold mb-4 block italic">Curadoria Exclusiva</span>
            <h1 class="text-6xl md:text-8xl font-serif text-slate-900 leading-[1.1]">
                Coleção de <br><span class="italic text-slate-400">Ativos Privados.</span>
            </h1>
        </div>

        <div class="mt-24 border-t border-b border-slate-100 py-12" data-aos="fade-up" data-aos-delay="200">
            <form action="{{ route('portfolio') }}" method="GET" class="flex flex-wrap items-end gap-x-16 gap-y-10">
                
                <div class="relative group min-w-[140px]">
                    <label class="block text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-black">Região</label>
                    <select name="location" class="appearance-none bg-transparent border-none text-[11px] uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 {{ request('location') ? 'text-slate-900' : 'text-slate-300' }}">
                        <option value="">Todas</option>
                        <option value="Lisboa" {{ request('location') == 'Lisboa' ? 'selected' : '' }}>Lisboa</option>
                        <option value="Cascais" {{ request('location') == 'Cascais' ? 'selected' : '' }}>Cascais</option>
                        <option value="Algarve" {{ request('location') == 'Algarve' ? 'selected' : '' }}>Algarve</option>
                    </select>
                </div>

                <div class="relative group min-w-[140px]">
                    <label class="block text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-black">Tipologia</label>
                    <select name="type" class="appearance-none bg-transparent border-none text-[11px] uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 {{ request('type') ? 'text-slate-900' : 'text-slate-300' }}">
                        <option value="">Coleção Inteira</option>
                        <option value="Apartamento" {{ request('type') == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                        <option value="Moradia" {{ request('type') == 'Moradia' ? 'selected' : '' }}>Moradia</option>
                        <option value="Penthouse" {{ request('type') == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                    </select>
                </div>

                <div class="relative group min-w-[140px]">
                    <label class="block text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-black">Quartos</label>
                    <select name="bedrooms" class="appearance-none bg-transparent border-none text-[11px] uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 {{ request('bedrooms') ? 'text-slate-900' : 'text-slate-300' }}">
                        <option value="">Qualquer</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                        <option value="4+" {{ request('bedrooms') == '4+' ? 'selected' : '' }}>4+ Quartos</option>
                    </select>
                </div>

                <div class="relative group min-w-[180px]">
                    <label class="block text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-black">Investimento Máximo</label>
                    <div class="flex items-center border-b border-slate-100 group-focus-within:border-slate-900 transition-colors">
                        <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Sem Limite" 
                            class="bg-transparent border-none text-[11px] uppercase tracking-[0.2em] font-black focus:ring-0 p-0 w-full placeholder:text-slate-200 text-slate-900 py-2">
                        <span class="text-[10px] text-slate-300 font-bold ml-2">€</span>
                    </div>
                </div>

                <div class="ml-auto flex items-center gap-10">
                    @if(request()->anyFilled(['location', 'type', 'bedrooms', 'price_max']))
                        <a href="{{ route('portfolio') }}" class="text-[9px] uppercase tracking-[0.3em] text-slate-300 hover:text-red-400 transition-colors font-black italic">Limpar Filtros</a>
                    @endif
                    <button type="submit" class="group relative px-12 py-5 bg-slate-900 overflow-hidden transition-all duration-500 shadow-xl">
                        <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.4em] font-black">Refinar Seleção</span>
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="pb-48 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-16 gap-y-32">
            @forelse($properties as $index => $property)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="relative aspect-[4/5] overflow-hidden mb-10 shadow-2xl">
                        <a href="{{ route('properties.show', $property->slug) }}">
                            <img src="{{ asset('storage/' . $property->cover_image) }}" 
                                 class="w-full h-full object-cover transition-transform duration-[3s] group-hover:scale-110 grayscale-[20%] group-hover:grayscale-0" 
                                 alt="{{ $property->title }}">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

                            @if(!$property->is_visible)
                                <div class="absolute top-8 left-8 px-5 py-2 bg-white/95 backdrop-blur shadow-sm">
                                    <span class="text-[10px] uppercase tracking-[0.3em] font-black text-slate-900 italic">Off-Market</span>
                                </div>
                            @endif
                        </a>
                    </div>

                    <div class="space-y-6">
                        <div class="flex justify-between items-start gap-4">
                            <div class="space-y-2">
                                <span class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-black block">
                                    {{ $property->city }} • {{ $property->type }}
                                </span>
                                <h3 class="text-3xl font-serif text-slate-900 leading-tight">
                                    <a href="{{ route('properties.show', $property->slug) }}" class="hover:text-slate-400 transition-colors duration-500 italic">
                                        {{ $property->title }}
                                    </a>
                                </h3>
                            </div>
                            <div class="text-right pt-2">
                                <span class="text-xl font-serif text-slate-900 block font-light">
                                    {{ number_format($property->price, 0, ',', '.') }}€
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex gap-10 pt-6 border-t border-slate-50">
                            <div class="flex flex-col gap-1">
                                <span class="text-[8px] uppercase tracking-[0.4em] text-slate-300 font-bold">Suites</span>
                                <span class="text-sm font-serif text-slate-600">{{ $property->bedrooms }}</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-[8px] uppercase tracking-[0.4em] text-slate-300 font-bold">Área</span>
                                <span class="text-sm font-serif text-slate-600">{{ (int)$property->area_useful ?? (int)$property->area_gross }}m²</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-[8px] uppercase tracking-[0.4em] text-slate-300 font-bold">Protocolo</span>
                                <span class="text-xs font-serif text-slate-600 italic">Privado</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-40 text-center border border-dashed border-slate-100">
                    <p class="text-slate-300 font-serif italic text-3xl">Novos ativos em fase de curadoria confidencial.</p>
                    <a href="{{ route('portfolio') }}" class="mt-8 inline-block text-[10px] uppercase tracking-[0.5em] font-black border-b-2 border-slate-900 pb-2">Ver coleção completa</a>
                </div>
            @endforelse
        </div>

        <div class="mt-48 border-t border-slate-50 pt-20">
            {{ $properties->appends(request()->query())->links() }}
        </div>
    </div>
</section>
@endsection