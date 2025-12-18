<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Curadoria | Luís Belo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
            <div class="p-10 text-center border-b border-white/5">
                <h1 class="font-serif text-xl tracking-[0.3em] uppercase">
                    LUÍS<span class="text-slate-500 font-light">BELO</span>
                </h1>
                <p class="text-[9px] uppercase tracking-[0.4em] text-slate-500 mt-3 font-bold">DASHBOARD</p>
            </div>
            
            <nav class="flex-1 p-6 space-y-3 mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-6 py-4 bg-white/5 border-l-2 border-white text-white text-xs uppercase tracking-widest font-bold transition-all">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Visão Geral
                </a>
                
                <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-4 px-6 py-4 text-slate-500 hover:text-white hover:bg-white/5 text-xs uppercase tracking-widest font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Imóveis
                </a>
                
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-4 px-6 py-4 text-slate-500 hover:text-white hover:bg-white/5 text-xs uppercase tracking-widest font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Ver Portal
                </a>
            </nav>

            <div class="p-8 border-t border-white/5">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-[9px] uppercase tracking-[0.3em] text-slate-500 hover:text-white transition-colors font-black">
                        Encerrar Sessão
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-slate-50">
            <div class="p-12 max-w-7xl mx-auto">
                <div class="flex justify-between items-center mb-16">
                    <div class="space-y-2">
                        <h2 class="text-4xl font-serif text-slate-900 leading-tight italic">Painel de Curadoria</h2>
                        <p class="text-slate-400 text-[10px] uppercase tracking-[0.4em] font-bold">Bem-vindo, Luís Belo</p>
                    </div>
                    <a href="{{ route('admin.properties.create') }}" class="group relative px-8 py-4 bg-slate-900 overflow-hidden">
                        <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.3em] font-bold">Novo Ativo</span>
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="bg-white p-8 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-slate-300 transition-colors">
                        <div>
                            <p class="text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-3 font-bold">Total Coleção</p>
                            <p class="text-5xl font-serif text-slate-900 italic">{{ \App\Models\Property::count() }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-8 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-slate-300 transition-colors">
                        <div>
                            <p class="text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-3 font-bold">Ativos à Venda</p>
                            <p class="text-5xl font-serif text-slate-900 italic">{{ \App\Models\Property::where('status', 'Venda')->count() }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-8 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-slate-300 transition-colors">
                        <div>
                            <p class="text-[9px] uppercase tracking-[0.4em] text-slate-400 mb-3 font-bold">Arrendamentos</p>
                            <p class="text-5xl font-serif text-slate-900 italic">{{ \App\Models\Property::where('status', 'Arrendamento')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 shadow-sm overflow-hidden">
                    <div class="px-10 py-8 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="font-serif text-xl italic text-slate-900">Adições Recentes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-[9px] uppercase tracking-[0.3em] text-slate-400 font-black">
                                <tr>
                                    <th class="px-10 py-5">Elemento</th>
                                    <th class="px-10 py-5">Valor</th>
                                    <th class="px-10 py-5">Localização</th>
                                    <th class="px-10 py-5">Transação</th>
                                    <th class="px-10 py-5 text-right">Acções</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach(\App\Models\Property::latest()->take(6)->get() as $property)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-10 py-6">
                                        <div class="flex items-center gap-6">
                                            <div class="w-16 h-16 bg-slate-100 overflow-hidden shadow-sm">
                                                @if($property->cover_image)
                                                    <img src="{{ asset('storage/'.$property->cover_image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-serif text-lg text-slate-900">{{ Str::limit($property->title, 25) }}</p>
                                                <p class="text-[9px] uppercase tracking-widest text-slate-400">{{ $property->type }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-10 py-6">
                                        <span class="font-serif text-slate-900">{{ number_format($property->price, 0, ',', '.') }}€</span>
                                    </td>
                                    <td class="px-10 py-6">
                                        <span class="text-xs text-slate-500 font-light tracking-wide italic">{{ $property->location }}</span>
                                    </td>
                                    <td class="px-10 py-6">
                                        <span class="text-[9px] uppercase tracking-[0.2em] font-black {{ $property->status == 'Venda' ? 'text-slate-900' : 'text-slate-400' }}">
                                            {{ $property->status }}
                                        </span>
                                    </td>
                                    <td class="px-10 py-6 text-right">
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="text-[10px] uppercase tracking-widest font-black text-slate-400 hover:text-slate-900 transition-colors">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>