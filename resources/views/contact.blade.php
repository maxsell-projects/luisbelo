@extends('layouts.app')

@section('title', 'Contacto Privado | Luís Belo')

@section('content')
<section class="relative pt-48 pb-24 bg-white overflow-hidden">
    <div class="max-container px-6 lg:px-12">
        <div class="max-w-3xl" data-aos="fade-up">
            <span class="text-[10px] uppercase tracking-[0.6em] text-slate-400 font-bold mb-6 block">Agendar Reunião</span>
            <h1 class="text-6xl md:text-7xl font-serif text-slate-900 leading-tight">
                Inicie a sua <br><span class="italic text-slate-400">jornada conosco.</span>
            </h1>
        </div>

        <div class="mt-24 grid grid-cols-1 lg:grid-cols-12 gap-20">
            
            <div class="lg:col-span-4 space-y-16" data-aos="fade-right" data-aos-delay="200">
                <div class="space-y-4">
                    <h4 class="text-[10px] uppercase tracking-[0.4em] text-slate-900 font-bold">SAC</h4>
                    <p class="text-2xl font-serif text-slate-500 hover:text-slate-900 transition-colors">
                        <a href="tel:919383222">919 383 222</a>
                    </p>
                </div>

                <div class="space-y-4">
                    <h4 class="text-[10px] uppercase tracking-[0.4em] text-slate-900 font-bold">Email</h4>
                    <p class="text-2xl font-serif text-slate-500 hover:text-slate-900 transition-colors">
                        <a href="mailto:luis.belo@remax.pt">luis.belo@remax.pt</a>
                    </p>
                </div>

                <div class="space-y-4">
                    <h4 class="text-[10px] uppercase tracking-[0.4em] text-slate-900 font-bold">Endereço</h4>
                    <p class="text-lg font-light leading-relaxed text-slate-500 italic">
                        Rua Serpa Pinto, 77 A<br>
                        2640-534, Mafra – Mafra
                    </p>
                </div>

                <div class="pt-8 border-t border-slate-100 flex gap-8">
                    <a href="#" class="text-[10px] uppercase tracking-widest font-bold text-slate-400 hover:text-slate-900 transition-colors italic">Instagram</a>
                    <a href="#" class="text-[10px] uppercase tracking-widest font-bold text-slate-400 hover:text-slate-900 transition-colors italic">LinkedIn</a>
                </div>
            </div>

            <div class="lg:col-span-8 bg-slate-50 p-12 md:p-20 shadow-sm" data-aos="fade-up" data-aos-delay="400">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-12">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div class="relative group">
                            <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-2">Nome Completo</label>
                            <input type="text" name="name" required class="w-full bg-transparent border-b border-slate-200 focus:border-slate-900 focus:ring-0 px-0 py-2 text-sm transition-colors outline-none">
                        </div>
                        <div class="relative group">
                            <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-2">Email Profissional</label>
                            <input type="email" name="email" required class="w-full bg-transparent border-b border-slate-200 focus:border-slate-900 focus:ring-0 px-0 py-2 text-sm transition-colors outline-none">
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="block text-[9px] uppercase tracking-widest text-slate-400 mb-2">Como podemos ajudar?</label>
                        <textarea name="message" rows="4" required class="w-full bg-transparent border-b border-slate-200 focus:border-slate-900 focus:ring-0 px-0 py-2 text-sm transition-colors outline-none resize-none"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="group relative px-16 py-5 bg-slate-900 overflow-hidden transition-all duration-500">
                            <span class="relative z-10 text-white text-[10px] uppercase tracking-[0.4em] font-bold">Enviar Mensagem</span>
                            <div class="absolute inset-0 bg-slate-800 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<section class="h-[60vh] w-full overflow-hidden grayscale hover:grayscale-0 transition-all duration-1000" data-aos="fade">
    <img src="{{ asset('img/photo.jpeg') }}" class="w-full h-full object-cover" alt="Localização">
</section>
@endsection