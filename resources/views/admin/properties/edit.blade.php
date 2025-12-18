<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ativo | Luís Belo</title>
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
    <style>
        .remove-btn { opacity: 0; transition: opacity 0.2s; }
        .photo-container:hover .remove-btn { opacity: 1; }
        input:focus, select:focus, textarea:focus { border-color: #0f172a !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
            <div class="p-10 text-center border-b border-white/5">
                <h1 class="font-serif text-xl tracking-[0.3em] uppercase italic">
                    LUÍS<span class="text-slate-500 font-light">BELO</span>
                </h1>
            </div>
            <nav class="flex-1 p-6 space-y-2 mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-6 py-4 text-slate-500 hover:text-white hover:bg-white/5 text-xs uppercase tracking-widest font-bold transition-all">Dashboard</a>
                <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-4 px-6 py-4 bg-white/5 border-l-2 border-white text-white text-xs uppercase tracking-widest font-bold transition-all">Imóveis</a>
            </nav>
        </aside>

        <main class="flex-1 p-12 overflow-y-auto bg-slate-50">
            <div class="max-w-5xl mx-auto pb-20">
                <div class="flex justify-between items-center mb-12">
                    <div class="space-y-2">
                        <h2 class="text-4xl font-serif text-slate-900 italic">Revisar Ativo</h2>
                        <p class="text-[10px] uppercase tracking-[0.4em] text-slate-400 font-bold">Atualização de Registro Privado</p>
                    </div>
                    <a href="{{ route('admin.properties.index') }}" class="text-[9px] uppercase tracking-widest text-slate-400 font-black hover:text-slate-900 transition-colors">← Voltar à Coleção</a>
                </div>

                @if ($errors->any())
                    <div class="bg-white border-l-4 border-slate-900 p-6 mb-10 shadow-sm">
                        <p class="text-xs uppercase tracking-widest font-black text-slate-900 mb-2">Revisão Necessária:</p>
                        <ul class="list-none text-xs text-slate-500 italic space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>— {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                    @csrf
                    @method('PUT')

                    <div class="bg-white p-10 border border-slate-100 shadow-sm">
                        <h3 class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-black mb-10 pb-4 border-b border-slate-50">01. Identidade do Imóvel</h3>
                        <div class="grid grid-cols-1 gap-10">
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Título Editorial</label>
                                <input type="text" name="title" value="{{ old('title', $property->title) }}" required class="w-full border-b border-slate-200 focus:outline-none py-3 text-lg font-serif placeholder:text-slate-200">
                            </div>
                            
                            <div class="grid grid-cols-3 gap-10">
                                <div>
                                    <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Tipologia</label>
                                    <select name="type" class="w-full border-b border-slate-200 bg-transparent focus:outline-none py-3 text-xs uppercase tracking-widest font-bold">
                                        <option value="Apartamento" {{ old('type', $property->type) == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                                        <option value="Moradia" {{ old('type', $property->type) == 'Moradia' ? 'selected' : '' }}>Moradia / Villa</option>
                                        <option value="Terreno" {{ old('type', $property->type) == 'Terreno' ? 'selected' : '' }}>Terreno</option>
                                        <option value="Penthouse" {{ old('type', $property->type) == 'Penthouse' ? 'selected' : '' }}>Penthouse</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Transacção</label>
                                    <select name="status" class="w-full border-b border-slate-200 bg-transparent focus:outline-none py-3 text-xs uppercase tracking-widest font-bold">
                                        <option value="Venda" {{ old('status', $property->status) == 'Venda' ? 'selected' : '' }}>Venda</option>
                                        <option value="Arrendamento" {{ old('status', $property->status) == 'Arrendamento' ? 'selected' : '' }}>Arrendamento</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Valor do Ativo (€)</label>
                                    <input type="number" name="price" value="{{ old('price', $property->price) }}" class="w-full border-b border-slate-200 focus:outline-none py-3 font-serif text-lg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-10 border border-slate-100 shadow-sm">
                        <h3 class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-black mb-10 pb-4 border-b border-slate-50">02. Dimensões e Detalhes</h3>
                        <div class="grid grid-cols-2 gap-10 mb-10">
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Concelho / Zona</label>
                                <input type="text" name="location" value="{{ old('location', $property->location) }}" class="w-full border-b border-slate-200 focus:outline-none py-3 text-sm italic">
                            </div>
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Área Bruta (m²)</label>
                                <input type="number" name="area_gross" value="{{ old('area_gross', $property->area_gross) }}" class="w-full border-b border-slate-200 focus:outline-none py-3 text-sm">
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-10">
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Quartos</label>
                                <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full border-b border-slate-200 focus:outline-none py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Banhos</label>
                                <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full border-b border-slate-200 focus:outline-none py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Energia</label>
                                <select name="energy_rating" class="w-full border-b border-slate-200 bg-transparent focus:outline-none py-3 text-xs font-bold">
                                    <option value="A+" {{ old('energy_rating', $property->energy_rating) == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A" {{ old('energy_rating', $property->energy_rating) == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('energy_rating', $property->energy_rating) == 'B' ? 'selected' : '' }}>B</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-3 font-bold italic">Solar</label>
                                <select name="orientation" class="w-full border-b border-slate-200 bg-transparent focus:outline-none py-3 text-xs font-bold">
                                    <option value="Sul" {{ old('orientation', $property->orientation) == 'Sul' ? 'selected' : '' }}>Sul</option>
                                    <option value="Norte" {{ old('orientation', $property->orientation) == 'Norte' ? 'selected' : '' }}>Norte</option>
                                    <option value="Nascente/Poente" {{ old('orientation', $property->orientation) == 'Nascente/Poente' ? 'selected' : '' }}>Nascente/Poente</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-10 border border-slate-100 shadow-sm">
                        <h3 class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-black mb-10 pb-4 border-b border-slate-50">03. Curadoria Visual</h3>
                        <div class="space-y-10">
                            <div class="flex gap-10 items-center">
                                <div class="w-32 aspect-square bg-slate-100 overflow-hidden shadow-sm">
                                    @if($property->cover_image)
                                        <img src="{{ asset('storage/'.$property->cover_image) }}" class="w-full h-full object-cover grayscale">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-4 font-bold italic">Alterar Dossier de Capa</label>
                                    <input type="file" name="cover_image" accept="image/*" class="text-xs text-slate-400 file:mr-6 file:py-3 file:px-8 file:border file:border-slate-900 file:bg-transparent file:text-slate-900 file:text-[9px] file:uppercase file:tracking-widest file:font-black hover:file:bg-slate-900 hover:file:text-white transition-all cursor-pointer">
                                </div>
                            </div>

                            @if($property->images->count() > 0)
                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-4 font-bold italic">Galeria Registrada</label>
                                <div class="grid grid-cols-4 md:grid-cols-8 gap-4">
                                    @foreach($property->images as $image)
                                        <div class="aspect-square bg-slate-50 border border-slate-100 overflow-hidden">
                                            <img src="{{ asset('storage/'.$image->path) }}" class="w-full h-full object-cover grayscale opacity-50">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <div>
                                <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-4 font-bold italic">Adicionar Novos Detalhes</label>
                                <input type="file" id="gallery-input" name="gallery[]" multiple accept="image/*" class="text-xs text-slate-400 file:mr-6 file:py-3 file:px-8 file:border file:border-slate-100 file:bg-slate-50 file:text-slate-400 file:text-[9px] file:uppercase file:tracking-widest file:font-black hover:file:bg-slate-100 transition-all cursor-pointer">
                                <div id="gallery-preview" class="grid grid-cols-4 md:grid-cols-6 gap-6 mt-10"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-10 border border-slate-100 shadow-sm">
                        <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-4 font-bold italic">Narrativa da Propriedade</label>
                        <textarea name="description" rows="8" class="w-full border border-slate-50 bg-slate-50/50 p-6 focus:outline-none text-slate-600 font-light italic leading-relaxed resize-none">{{ old('description', $property->description) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-10 items-center">
                        <button type="submit" class="group relative px-16 py-6 bg-slate-900 overflow-hidden">
                            <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.4em] font-bold">Atualizar Ativo</span>
                            <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('gallery-input');
            const previewContainer = document.getElementById('gallery-preview');
            const dt = new DataTransfer();

            input.addEventListener('change', function() {
                for(let i = 0; i < this.files.length; i++) {
                    const file = this.files[i];
                    dt.items.add(file);
                    const div = document.createElement('div');
                    div.className = "photo-container relative aspect-square w-full bg-slate-100 overflow-hidden group";
                    const img = document.createElement('img');
                    img.className = "h-full w-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500";
                    const btn = document.createElement('button');
                    btn.innerHTML = '&times;';
                    btn.className = "remove-btn absolute top-2 right-2 bg-slate-900 text-white w-6 h-6 flex items-center justify-center text-xs shadow-xl";
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function(e) { img.src = e.target.result; };
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        div.remove();
                        updateInputFiles(file);
                    });
                    div.appendChild(img);
                    div.appendChild(btn);
                    previewContainer.appendChild(div);
                }
                this.files = dt.files;
            });

            function updateInputFiles(fileToRemove) {
                const newDt = new DataTransfer();
                for (let i = 0; i < dt.files.length; i++) {
                    const file = dt.files[i];
                    if (file !== fileToRemove) { newDt.items.add(file); }
                }
                dt.items.clear();
                for (let i = 0; i < newDt.files.length; i++) { dt.items.add(newDt.files[i]); }
                input.files = dt.files;
            }
        });
    </script>
</body>
</html>