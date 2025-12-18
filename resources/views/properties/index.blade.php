@extends('layouts.app')

@section('title', 'Coleção de Propriedades | Luís Belo')

@section('content')
<section class="relative pt-48 pb-20 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="max-w-3xl animate__animated animate__fadeIn">
            <span class="text-[10px] uppercase tracking-[0.6em] text-slate-400 font-bold mb-4 block">Portfolio Exclusivo</span>
            <h1 class="text-6xl md:text-7xl font-serif text-slate-900 leading-tight">
                Coleção de <br><span class="italic text-slate-400">Propriedades.</span>
            </h1>
        </div>

        <div class="mt-20 border-t border-b border-slate-100 py-10">
            <form action="{{ route('portfolio') }}" method="GET" class="flex flex-wrap items-end gap-x-16 gap-y-8">
                
                <div class="relative group">
                    <label class="block text-[10px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-bold">Onde</label>
                    <select name="location" class="appearance-none bg-transparent border-none text-xs uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 text-slate-900">
                        <option value="">Todas as Regiões</option>
                        <option value="Lisboa" {{ request('location') == 'Lisboa' ? 'selected' : '' }}>Lisboa</option>
                        <option value="Cascais" {{ request('location') == 'Cascais' ? 'selected' : '' }}>Cascais</option>
                        <option value="Algarve" {{ request('location') == 'Algarve' ? 'selected' : '' }}>Algarve</option>
                    </select>
                    <div class="absolute right-0 bottom-1 pointer-events-none">
                        <svg class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>

                <div class="relative group">
                    <label class="block text-[10px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-bold">Tipologia</label>
                    <select name="type" class="appearance-none bg-transparent border-none text-xs uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 text-slate-900">
                        <option value="">Toda a Coleção</option>
                        <option value="Apartamento" {{ request('type') == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                        <option value="Moradia" {{ request('type') == 'Moradia' ? 'selected' : '' }}>Moradia</option>
                        <option value="Penthouse" {{ request('type') == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                    </select>
                    <div class="absolute right-0 bottom-1 pointer-events-none">
                        <svg class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>

                <div class="relative group">
                    <label class="block text-[10px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-bold">Transação</label>
                    <select name="status" class="appearance-none bg-transparent border-none text-xs uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 text-slate-900">
                        <option value="">Todos os Status</option>
                        <option value="Venda" {{ request('status') == 'Venda' ? 'selected' : '' }}>Venda</option>
                        <option value="Arrendamento" {{ request('status') == 'Arrendamento' ? 'selected' : '' }}>Arrendamento</option>
                    </select>
                    <div class="absolute right-0 bottom-1 pointer-events-none">
                        <svg class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>

                <div class="relative group">
                    <label class="block text-[10px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-bold">Quartos</label>
                    <select name="bedrooms" class="appearance-none bg-transparent border-none text-xs uppercase tracking-[0.2em] font-black focus:ring-0 p-0 cursor-pointer pr-8 text-slate-900">
                        <option value="">Qualquer</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                        <option value="4+" {{ request('bedrooms') == '4+' ? 'selected' : '' }}>4+</option>
                    </select>
                    <div class="absolute right-0 bottom-1 pointer-events-none">
                        <svg class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>

                <div class="relative group min-w-[150px]">
                    <label class="block text-[10px] uppercase tracking-[0.4em] text-slate-400 mb-4 font-bold">Investimento Máx.</label>
                    <div class="flex items-center">
                        <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Sem Limite" 
                            class="bg-transparent border-none text-xs uppercase tracking-[0.2em] font-black focus:ring-0 p-0 w-full placeholder:text-slate-200 text-slate-900">
                        <span class="text-[10px] text-slate-300 font-bold ml-2">€</span>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-px bg-slate-100 group-focus-within:bg-slate-900 transition-colors"></div>
                </div>

                <div class="ml-auto flex items-center gap-8">
                    <a href="{{ route('portfolio') }}" class="text-[9px] uppercase tracking-[0.3em] text-slate-300 hover:text-slate-900 transition-colors italic">Limpar</a>
                    <button type="submit" class="group relative px-10 py-4 bg-slate-900 overflow-hidden transition-all duration-500">
                        <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.4em] font-bold">Refinar Seleção</span>
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="pb-40 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24">
            @forelse($properties as $property)
                <div class="group animate__animated animate__fadeInUp">
                    <div class="relative aspect-[3/4] overflow-hidden mb-8">
                        <a href="{{ route('properties.show', $property->slug) }}">
                            <img src="{{ asset('storage/' . $property->cover_image) }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" 
                                 alt="{{ $property->title }}">
                            
                            <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-500"></div>

                            @if(!$property->is_visible)
                                <div class="absolute top-6 left-6 px-4 py-1 bg-white/90 backdrop-blur">
                                    <span class="text-[9px] uppercase tracking-widest font-bold text-slate-900">Sob Consulta</span>
                                </div>
                            @endif
                        </a>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <span class="text-[9px] uppercase tracking-[0.4em] text-slate-400 font-bold">
                                    {{ $property->city }} • {{ $property->type }}
                                </span>
                                <h3 class="text-2xl font-serif text-slate-900 leading-tight">
                                    <a href="{{ route('properties.show', $property->slug) }}" class="hover:text-slate-500 transition-colors">
                                        {{ $property->title }}
                                    </a>
                                </h3>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-serif text-slate-900 block">
                                    {{ number_format($property->price, 0, ',', '.') }}€
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex gap-8 pt-4 border-t border-slate-50">
                            <div class="flex flex-col">
                                <span class="text-[8px] uppercase tracking-widest text-slate-300">Quartos</span>
                                <span class="text-xs font-bold text-slate-600 tracking-widest">{{ $property->bedrooms }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[8px] uppercase tracking-widest text-slate-300">Área Útil</span>
                                <span class="text-xs font-bold text-slate-600 tracking-widest">{{ (int)$property->area_useful ?? (int)$property->area_gross }}m²</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[8px] uppercase tracking-widest text-slate-300">Cidade</span>
                                <span class="text-xs font-bold text-slate-600 tracking-widest">{{ $property->city }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <p class="text-slate-400 font-serif italic text-2xl">Novas propriedades em fase de curadoria privada.</p>
                    <a href="{{ route('portfolio') }}" class="mt-6 inline-block text-[10px] uppercase tracking-[0.3em] font-bold border-b border-slate-900 pb-1">Ver toda a coleção</a>
                </div>
            @endforelse
        </div>

        <div class="mt-32 border-t border-slate-100 pt-16">
            {{ $properties->appends(request()->query())->links() }}
        </div>
    </div>
</section>
@endsection