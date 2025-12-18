@extends('layouts.app')

@section('title', 'A Minha História | Luís Belo')

@section('content')
<section class="relative pt-48 pb-32 bg-white overflow-hidden">
    <div class="max-container px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row items-end justify-between gap-12" data-aos="fade-up">
            <div class="max-w-3xl">
                <span class="text-[10px] uppercase tracking-[0.6em] text-slate-400 font-bold mb-6 block">O Consultor</span>
                <h1 class="text-6xl md:text-8xl font-serif text-slate-900 leading-none">
                    Imóveis não são <br><span class="italic text-slate-400">números.</span>
                </h1>
            </div>
            <div class="max-w-md pb-4">
                <p class="text-xl font-serif italic text-slate-500 leading-relaxed">
                    "São Planos, Pessoas e Possibilidades."
                </p>
            </div>
        </div>
        
        <div class="mt-24 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-7 overflow-hidden shadow-2xl" data-aos="fade-right" data-aos-delay="200">
                <img src="{{ asset('img/photo.jpg') }}" 
                     class="w-full h-[700px] object-cover hover:scale-105 transition-transform duration-[3s]" 
                     alt="Luís Belo">
            </div>
            <div class="lg:col-span-5 space-y-8" data-aos="fade-left" data-aos-delay="400">
                <div class="w-16 h-px bg-slate-900"></div>
                <p class="text-slate-600 font-light leading-relaxed text-lg">
                    Como consultor imobiliário solo, acredito que cada imóvel deve ser mais do que uma transação — deve ser uma ponte para o futuro que o cliente deseja construir.
                </p>
                <p class="text-slate-600 font-light leading-relaxed text-lg">
                    Com base em ética, precisão e um acompanhamento verdadeiramente personalizado, ajudo compradores e investidores a encontrar mais do que casas: encontro oportunidades de vida, património e legado.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-32 bg-slate-50 overflow-hidden">
    <div class="max-container px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
            <div class="space-y-12" data-aos="fade-right">
                <h2 class="text-[10px] uppercase tracking-[0.5em] text-slate-400 font-bold">Minha História</h2>
                <h3 class="text-5xl font-serif text-slate-900 leading-tight italic">
                    Da disciplina do ar à <br>sensibilidade do som.
                </h3>
            </div>
            <div class="space-y-8 text-slate-600 font-light leading-relaxed text-lg" data-aos="fade-left" data-aos-delay="200">
                <p>
                    Sempre acreditei que as escolhas que fazemos ao longo da vida moldam não apenas a nossa carreira, mas a forma como impactamos o mundo à nossa volta.
                </p>
                <p>
                    Fui <strong>oficial das forças aéreas</strong> — onde aprendi disciplina, planeamento e responsabilidade. Mais tarde, vivi o universo da <strong>produção de som</strong>, entre estúdios, orquestras e gravações técnicas — onde desenvolvi escuta activa, sensibilidade e atenção ao detalhe.
                </p>
                <p>
                    Hoje, levo todo esse percurso para a consultoria imobiliária. Acredito que imóveis não são apenas transações — são marcos de vida. E é por isso que actuo com rigor e proximidade, acompanhando cada cliente como se fosse único. Porque é.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-40 bg-white">
    <div class="max-container px-6 lg:px-12">
        <div class="text-center mb-24" data-aos="fade-up">
            <h2 class="text-[10px] uppercase tracking-[0.6em] text-slate-400 font-bold mb-4">Princípios</h2>
            <h3 class="text-4xl font-serif text-slate-900 italic">Meus Valores</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            @php
                $valores = [
                    ['01', 'Rigor', 'Actuação precisa, planeada e sem improvisos. Cada passo é pensado para proteger os teus interesses.'],
                    ['02', 'Transparência', 'Comunicação directa e sem rodeios. Acreditar na verdade constrói confiança — e confiança vende.'],
                    ['03', 'Ética', 'Trato o teu património com o mesmo cuidado que trato o meu nome. Nunca recomendo o que não faria.'],
                    ['04', 'Excelência', 'Desde a primeira conversa ao fecho da escritura, ofereço uma experiência elevada — porque os teus sonhos não têm preço.']
                ];
            @endphp

            @foreach($valores as $index => $valor)
                <div class="p-12 border border-slate-50 hover:border-slate-200 transition-colors group" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $index * 150 }}">
                    <span class="text-3xl font-serif text-slate-100 group-hover:text-slate-200 transition-colors block mb-8">{{ $valor[0] }}</span>
                    <h4 class="text-xs uppercase tracking-[0.3em] font-bold text-slate-900 mb-6">{{ $valor[1] }}</h4>
                    <p class="text-sm text-slate-500 font-light leading-relaxed italic">
                        {{ $valor[2] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-32 bg-slate-900 text-white overflow-hidden relative">
    <div class="absolute top-0 right-0 text-[30rem] font-serif text-white/[0.02] select-none leading-none -translate-y-1/4 translate-x-1/4">
        LB
    </div>
    <div class="max-container px-6 lg:px-12 relative z-10 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-serif italic mb-12">Vamos desenhar o seu próximo legado?</h2>
        <a href="{{ route('contact') }}" 
           class="inline-block px-12 py-5 bg-white text-slate-900 text-[10px] uppercase tracking-[0.4em] font-bold hover:bg-slate-100 transition-all">
            Iniciar Conversa Privada
        </a>
    </div>
</section>
@endsection