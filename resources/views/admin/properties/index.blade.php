<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleção de Ativos | Admin | Luís Belo</title>
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
                <h1 class="font-serif text-xl tracking-[0.3em] uppercase italic">
                    LUÍS<span class="text-slate-500 font-light">BELO</span>
                </h1>
                <p class="text-[9px] uppercase tracking-[0.4em] text-slate-500 mt-3 font-bold">GESTÃO DE ATIVOS</p>
            </div>
            <nav class="flex-1 p-6 space-y-2 mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-6 py-4 text-slate-500 hover:text-white hover:bg-white/5 text-xs uppercase tracking-widest font-bold transition-all">Dashboard</a>
                <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-4 px-6 py-4 bg-white/5 border-l-2 border-white text-white text-xs uppercase tracking-widest font-bold transition-all">Imóveis</a>
            </nav>
            <div class="p-8 border-t border-white/5">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-[9px] uppercase tracking-[0.3em] text-slate-500 hover:text-red-400 transition-colors font-black">Encerrar Sessão</button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-12 overflow-y-auto bg-slate-50">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-12">
                    <div class="space-y-2">
                        <h2 class="text-4xl font-serif text-slate-900 italic">Todos os Ativos</h2>
                        <p class="text-[10px] uppercase tracking-[0.4em] text-slate-400 font-bold">Listagem Completa da Coleção</p>
                    </div>
                    <a href="{{ route('admin.properties.create') }}" class="group relative px-10 py-4 bg-slate-900 overflow-hidden">
                        <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.3em] font-bold">+ Novo Registro</span>
                        <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    </a>
                </div>

                <div class="bg-white border border-slate-100 shadow-sm overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 text-[9px] uppercase tracking-[0.3em] text-slate-400 font-black border-b border-slate-100">
                            <tr>
                                <th class="px-10 py-6">Visual</th>
                                <th class="px-10 py-6">Identificação</th>
                                <th class="px-10 py-6">Valor Mercadológico</th>
                                <th class="px-10 py-6">Localização</th>
                                <th class="px-10 py-6 text-right">Ações de Curadoria</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($properties as $property)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-10 py-6 w-32">
                                    <div class="w-20 h-16 bg-slate-100 overflow-hidden shadow-sm">
                                        @if($property->cover_image)
                                            <img src="{{ asset('storage/'.$property->cover_image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[8px] text-slate-300 uppercase tracking-widest">N/A</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-10 py-6">
                                    <p class="font-serif text-lg text-slate-900 leading-tight mb-1">{{ Str::limit($property->title, 45) }}</p>
                                    <span class="text-[9px] uppercase tracking-widest text-slate-400 font-bold">{{ $property->type }} • {{ $property->status }}</span>
                                </td>
                                <td class="px-10 py-6">
                                    <span class="font-serif text-slate-900 text-lg italic">{{ number_format($property->price, 0, ',', '.') }}€</span>
                                </td>
                                <td class="px-10 py-6">
                                    <span class="text-xs text-slate-500 font-light tracking-wide">{{ $property->location }}</span>
                                </td>
                                <td class="px-10 py-6 text-right">
                                    <div class="flex justify-end gap-6 items-center">
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="text-[10px] uppercase tracking-widest font-black text-slate-400 hover:text-slate-900 transition-colors">Revisar</a>
                                        
                                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Confirmar remoção deste ativo da coleção?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-[10px] uppercase tracking-widest font-black text-slate-300 hover:text-red-500 transition-colors italic">Remover</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-12 border-t border-slate-100 pt-8">
                    {{ $properties->links() }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>