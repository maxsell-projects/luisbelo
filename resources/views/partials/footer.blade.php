<footer class="bg-white border-t border-slate-100 pt-32 pb-12">
    <div class="max-container px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-16 mb-24">
            
            <div class="md:col-span-5 space-y-8">
                <a href="{{ route('home') }}" class="inline-block">
                    <span class="text-2xl font-serif tracking-[0.3em] uppercase text-slate-900">
                        Luís<span class="text-slate-400 font-light">Belo</span>
                    </span>
                </a>
                <p class="text-slate-500 text-sm leading-relaxed font-light max-w-sm italic">
                    Curadoria estratégica de propriedades exclusivas e consultoria de investimento imobiliário de alto padrão em Portugal.
                </p>
                <div class="flex gap-8 pt-4">
                    <a href="#" class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 hover:text-slate-900 transition-colors">Instagram</a>
                    <a href="#" class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 hover:text-slate-900 transition-colors">LinkedIn</a>
                </div>
            </div>

            <div class="md:col-span-3 space-y-8">
                <h4 class="text-[10px] uppercase tracking-[0.4em] font-black text-slate-900">Navegação</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-slate-900 text-[11px] uppercase tracking-widest transition-colors">Início</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-slate-400 hover:text-slate-900 text-[11px] uppercase tracking-widest transition-colors">Coleção</a></li>
                    <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-slate-900 text-[11px] uppercase tracking-widest transition-colors">O Consultor</a></li>
                    <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-slate-900 text-[11px] uppercase tracking-widest transition-colors">Contacto Privado</a></li>
                </ul>
            </div>

            <div class="md:col-span-4 space-y-8">
                <h4 class="text-[10px] uppercase tracking-[0.4em] font-black text-slate-900">Escritório</h4>
                <p class="text-slate-500 text-[11px] uppercase tracking-widest leading-loose font-light">
                    Rua Serpa Pinto, 77 A<br>
                    2640-534, Mafra — Portugal<br>
                    <span class="inline-block mt-4 text-slate-900 font-bold">T. 919 383 222</span>
                </p>
            </div>
        </div>

        <div class="pt-12 border-t border-slate-50 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <div class="w-8 h-px bg-slate-200"></div>
                <p class="text-[9px] uppercase tracking-[0.3em] text-slate-300 font-medium">
                    &copy; {{ date('Y') }} Luís Belo. Real Estate Excellence.
                </p>
            </div>
            
            <div class="flex gap-10">
                <a href="#" class="text-[9px] uppercase tracking-[0.2em] text-slate-300 hover:text-slate-900 transition-colors">Política de Privacidade</a>
                <a href="#" class="text-[9px] uppercase tracking-[0.2em] text-slate-300 hover:text-slate-900 transition-colors">Termos & Condições</a>
            </div>
        </div>
    </div>
</footer>