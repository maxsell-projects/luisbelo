@extends('layouts.app')

@section('content')

{{-- Cabeçalho Simples --}}
<div class="bg-brand-black text-white py-12 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="container mx-auto px-6 relative z-10">
        <h1 class="text-3xl font-serif text-white">Simulador de IMT e Selo 2025</h1>
    </div>
</div>

<section class="py-12 bg-gray-50" x-data="imtCalculator()" x-init="calculate()">
    <div class="container mx-auto px-4 md:px-8 max-w-6xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            {{-- ÁREA DO FORMULÁRIO --}}
            <div class="lg:col-span-7 bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
                
                <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Dados para a simulação</h3>
                
                <div class="space-y-6">
                    
                    {{-- Local do imóvel --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Local do imóvel</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="location" value="continente" x-model="location" @change="calculate()" class="peer sr-only">
                                <div class="px-4 py-3 rounded-lg border border-gray-200 peer-checked:border-brand-gold peer-checked:bg-brand-gold/10 peer-checked:text-brand-black hover:bg-gray-50 transition-all text-sm font-medium text-center">
                                    Portugal Continental
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="location" value="ilhas" x-model="location" @change="calculate()" class="peer sr-only">
                                <div class="px-4 py-3 rounded-lg border border-gray-200 peer-checked:border-brand-gold peer-checked:bg-brand-gold/10 peer-checked:text-brand-black hover:bg-gray-50 transition-all text-sm font-medium text-center">
                                    Regiões Autónomas
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Finalidade do imóvel --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Finalidade do imóvel</label>
                        <select x-model="purpose" @change="calculate()" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-gold/50 focus:border-brand-gold text-sm text-gray-700">
                            <option value="hpp">Habitação Própria e Permanente</option>
                            <option value="secundaria">Habitação Secundária ou Arrendamento</option>
                            <option value="rustico">Prédios Rústicos</option>
                            <option value="urbano">Prédios Urbanos e Outras Aquisições Onerosas</option>
                            <option value="offshore_pessoal">Adquirente (exceto particulares) residente em paraíso fiscal</option>
                            <option value="offshore_entidade">Entidade dominada ou controlada, com domicílio em paraíso fiscal</option>
                        </select>
                    </div>

                    {{-- Preço do imóvel --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Preço do imóvel</label>
                        <div class="relative">
                            <input type="number" x-model.number="propertyValue" @input="calculate()" class="w-full border border-gray-300 rounded-lg pl-4 pr-10 py-3 focus:outline-none focus:ring-2 focus:ring-brand-gold/50 focus:border-brand-gold text-lg font-medium text-gray-800" placeholder="0,00">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">€</span>
                        </div>
                    </div>

                    {{-- Número de compradores --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Número de compradores</label>
                        <div class="flex gap-4">
                            <label class="cursor-pointer flex-1">
                                <input type="radio" name="buyers" :value="1" x-model.number="buyersCount" @change="calculate()" class="peer sr-only">
                                <div class="px-4 py-3 rounded-lg border border-gray-200 peer-checked:border-brand-gold peer-checked:bg-brand-gold/10 peer-checked:text-brand-black hover:bg-gray-50 transition-all text-center text-sm font-bold">
                                    1
                                </div>
                            </label>
                            <label class="cursor-pointer flex-1">
                                <input type="radio" name="buyers" :value="2" x-model.number="buyersCount" @change="calculate()" class="peer sr-only">
                                <div class="px-4 py-3 rounded-lg border border-gray-200 peer-checked:border-brand-gold peer-checked:bg-brand-gold/10 peer-checked:text-brand-black hover:bg-gray-50 transition-all text-center text-sm font-bold">
                                    2
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                {{-- Seção de Compradores (Visível apenas para HPP) --}}
                <div x-show="purpose === 'hpp'" x-transition class="mt-8 pt-8 border-t border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Informação relativa aos compradores</h3>
                    
                    <div class="space-y-8">
                        
                        {{-- Comprador 1 --}}
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 relative">
                            <span class="text-xs font-bold uppercase text-gray-400 tracking-wider mb-3 block">Comprador 1</span>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 mb-2">Idade do primeiro comprador</label>
                                    <input type="number" x-model.number="buyer1Age" @input="checkAge(1); calculate()" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-brand-gold outline-none" placeholder="Ex: 30">
                                </div>
                                
                                <div>
                                    <div class="flex items-center gap-1 mb-2">
                                        <label class="block text-xs font-bold text-gray-700">Cumpre os requisitos para beneficiar do IMT Jovem?</label>
                                        <div class="group relative cursor-help">
                                            <span class="bg-gray-200 text-gray-600 rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold">?</span>
                                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-56 bg-gray-900 text-white text-xs p-2 rounded hidden group-hover:block z-20 text-center shadow-lg">
                                                Necessário ter até 35 anos e ser a primeira habitação própria e permanente.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <button type="button" @click="setBuyerEligible(1, true)" :class="buyer1Eligible ? 'bg-brand-black text-white border-brand-black' : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50'" class="flex-1 py-2 text-xs border rounded transition-all font-medium">Sim</button>
                                        <button type="button" @click="setBuyerEligible(1, false)" :class="!buyer1Eligible ? 'bg-gray-200 text-gray-800 border-gray-300' : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50'" class="flex-1 py-2 text-xs border rounded transition-all font-medium">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Comprador 2 (Condicional) --}}
                        <div x-show="buyersCount === 2" x-transition class="bg-gray-50 p-5 rounded-lg border border-gray-200 relative">
                            <span class="text-xs font-bold uppercase text-gray-400 tracking-wider mb-3 block">Comprador 2</span>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 mb-2">Idade do segundo comprador</label>
                                    <input type="number" x-model.number="buyer2Age" @input="checkAge(2); calculate()" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:border-brand-gold outline-none" placeholder="Ex: 36">
                                </div>
                                
                                <div>
                                    <div class="flex items-center gap-1 mb-2">
                                        <label class="block text-xs font-bold text-gray-700">Cumpre os requisitos para beneficiar do IMT Jovem?</label>
                                        <div class="group relative cursor-help">
                                            <span class="bg-gray-200 text-gray-600 rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold">?</span>
                                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-56 bg-gray-900 text-white text-xs p-2 rounded hidden group-hover:block z-20 text-center shadow-lg">
                                                Necessário ter até 35 anos e ser a primeira habitação própria e permanente.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <button type="button" @click="setBuyerEligible(2, true)" :class="buyer2Eligible ? 'bg-brand-black text-white border-brand-black' : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50'" class="flex-1 py-2 text-xs border rounded transition-all font-medium">Sim</button>
                                        <button type="button" @click="setBuyerEligible(2, false)" :class="!buyer2Eligible ? 'bg-gray-200 text-gray-800 border-gray-300' : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50'" class="flex-1 py-2 text-xs border rounded transition-all font-medium">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-8">
                    <button @click="scrollToResults" class="w-full bg-brand-black text-white font-bold uppercase tracking-widest py-4 rounded-lg shadow-lg hover:bg-gray-800 transition-all transform hover:-translate-y-1">
                        Simular
                    </button>
                </div>

            </div>

            {{-- ÁREA DE RESULTADOS --}}
            <div class="lg:col-span-5" id="results-area">
                <div class="sticky top-24 bg-brand-charcoal text-white p-8 rounded-xl shadow-2xl">
                    <div class="flex justify-between items-start mb-6 border-b border-white/10 pb-4">
                        <h3 class="text-2xl font-serif text-brand-gold">Resultados</h3>
                    </div>

                    <div class="space-y-5">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">IMT</span>
                            <span class="font-bold text-lg">€ <span x-text="formatMoney(finalIMT)"></span></span>
                        </div>
                        
                        <div class="flex justify-between items-center text-sm border-b border-white/10 pb-5">
                            <span class="text-gray-400">Imposto de Selo</span>
                            <span class="font-bold text-lg">€ <span x-text="formatMoney(finalStamp)"></span></span>
                        </div>

                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <p class="text-xs uppercase tracking-widest text-gray-400 mb-2">Total a Pagar</p>
                            <p class="text-4xl font-serif text-brand-gold">€ <span x-text="formatMoney(totalPayable)"></span></p>
                        </div>
                    </div>

                    {{-- Call to Action --}}
                    <div class="mt-8 text-center space-y-4">
                        <p class="text-sm font-medium text-white">O seu próximo passo para a nova casa.</p>
                        <p class="text-xs text-gray-400 leading-relaxed">Já sabe quanto vai pagar de IMT, agora deixe-nos ajudá-lo a encontrar o melhor crédito habitação para concretizar a compra.</p>
                        <a href="{{ route('tools.credit') }}" class="block w-full bg-brand-gold text-brand-black font-bold uppercase tracking-widest py-3 rounded-lg hover:bg-white hover:text-brand-black transition-colors text-xs shadow-md">
                            Quero ajuda para o meu crédito
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function imtCalculator() {
        return {
            location: 'continente',
            purpose: 'hpp',
            propertyValue: '',
            buyersCount: 1,
            
            buyer1Age: '',
            buyer1Eligible: false,
            
            buyer2Age: '',
            buyer2Eligible: false,

            finalIMT: 0,
            finalStamp: 0,
            totalPayable: 0,

            setBuyerEligible(buyerIndex, value) {
                if (buyerIndex === 1) this.buyer1Eligible = value;
                if (buyerIndex === 2) this.buyer2Eligible = value;
                this.calculate();
            },

            formatMoney(value) {
                return new Intl.NumberFormat('pt-PT', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(value);
            },

            scrollToResults() {
                const el = document.getElementById('results-area');
                if(el) el.scrollIntoView({ behavior: 'smooth' });
                this.calculate();
            },

            checkAge(buyerIndex) {
                // Desativa automaticamente se a idade for > 35
                if (buyerIndex === 1) {
                    if (this.buyer1Age > 35) this.buyer1Eligible = false;
                }
                if (buyerIndex === 2) {
                    if (this.buyer2Age > 35) this.buyer2Eligible = false;
                }
            },

            // Calcula o IMT "Normal" Total (Sem isenção Jovem)
            calculateNormalIMT(valor, tabela) {
                let taxa = 0;
                let parcelaAbater = 0;
                
                // TABELAS IMT 2025
                if (tabela === 'hpp_continente') {
                    if (valor <= 104261) { taxa = 0; parcelaAbater = 0; }
                    else if (valor <= 142618) { taxa = 0.02; parcelaAbater = 2085.22; }
                    else if (valor <= 194458) { taxa = 0.05; parcelaAbater = 6363.76; }
                    else if (valor <= 324058) { taxa = 0.07; parcelaAbater = 10252.92; }
                    else if (valor <= 648022) { taxa = 0.08; parcelaAbater = 13493.50; }
                    else if (valor <= 1128287) { return valor * 0.06; } // Taxa única
                    else { return valor * 0.075; } // Taxa única
                    
                    return Math.max(0, (valor * taxa) - parcelaAbater);
                }

                if (tabela === 'hpp_ilhas') {
                    if (valor <= 130326) { taxa = 0; parcelaAbater = 0; }
                    else if (valor <= 178273) { taxa = 0.02; parcelaAbater = 2606.52; }
                    else if (valor <= 243073) { taxa = 0.05; parcelaAbater = 7954.71; }
                    else if (valor <= 405073) { taxa = 0.07; parcelaAbater = 12816.17; }
                    else if (valor <= 810145) { taxa = 0.08; parcelaAbater = 16866.90; }
                    else if (valor <= 1410359) { return valor * 0.06; }
                    else { return valor * 0.075; }

                    return Math.max(0, (valor * taxa) - parcelaAbater);
                }

                if (tabela === 'secundaria_continente') {
                    if (valor <= 104261) { taxa = 0.01; parcelaAbater = 0; }
                    else if (valor <= 142618) { taxa = 0.02; parcelaAbater = 1042.61; }
                    else if (valor <= 194458) { taxa = 0.05; parcelaAbater = 5321.15; }
                    else if (valor <= 324058) { taxa = 0.07; parcelaAbater = 9210.31; }
                    else if (valor <= 621501) { taxa = 0.08; parcelaAbater = 12450.89; }
                    else if (valor <= 1128287) { return valor * 0.06; }
                    else { return valor * 0.075; }
                    
                    return Math.max(0, (valor * taxa) - parcelaAbater);
                }

                if (tabela === 'secundaria_ilhas') {
                    if (valor <= 130326) { taxa = 0.01; parcelaAbater = 0; }
                    else if (valor <= 178273) { taxa = 0.02; parcelaAbater = 1303.26; }
                    else if (valor <= 243073) { taxa = 0.05; parcelaAbater = 6651.45; }
                    else if (valor <= 405073) { taxa = 0.07; parcelaAbater = 11512.91; }
                    else if (valor <= 776876) { taxa = 0.08; parcelaAbater = 15563.64; }
                    else if (valor <= 1410359) { return valor * 0.06; }
                    else { return valor * 0.075; }

                    return Math.max(0, (valor * taxa) - parcelaAbater);
                }

                return 0;
            },

            // Calcula o IMT para Jovem (Total)
            calculateYoungIMT(valor, location) {
                // Limites OE2025
                const limitIsencao = location === 'continente' ? 324058 : 405073;
                const limitParcial = location === 'continente' ? 648022 : 810145;
                const taxaExcedente = 0.08;

                if (valor <= limitIsencao) {
                    return 0; // Isenção Total
                } else if (valor <= limitParcial) {
                    // Isenção Parcial: Paga 8% sobre o excedente
                    return (valor - limitIsencao) * taxaExcedente;
                } else {
                    // Sem isenção: Calcula como Normal
                    const tabela = location === 'continente' ? 'hpp_continente' : 'hpp_ilhas';
                    return this.calculateNormalIMT(valor, tabela);
                }
            },

            calculate() {
                let valorTotal = this.propertyValue || 0;
                
                if (valorTotal <= 0) {
                    this.finalIMT = 0;
                    this.finalStamp = 0;
                    this.totalPayable = 0;
                    return;
                }

                let imtBaseNormal = 0;
                let rateSelo = 0.008; 

                // 1. Determinar Taxas Normais (Sem Jovem)
                if (this.purpose === 'rustico') {
                    imtBaseNormal = valorTotal * 0.05;
                } else if (this.purpose === 'urbano') {
                    imtBaseNormal = valorTotal * 0.065;
                } else if (this.purpose === 'offshore_pessoal' || this.purpose === 'offshore_entidade') {
                    imtBaseNormal = valorTotal * 0.10;
                    rateSelo = 0.10; 
                } else {
                    let tabela = '';
                    if (this.purpose === 'hpp') {
                        tabela = this.location === 'continente' ? 'hpp_continente' : 'hpp_ilhas';
                    } else {
                        tabela = this.location === 'continente' ? 'secundaria_continente' : 'secundaria_ilhas';
                    }
                    imtBaseNormal = this.calculateNormalIMT(valorTotal, tabela);
                }

                // 2. Determinar IMT se fosse 100% Jovem (Apenas se HPP)
                let imtBaseJovem = imtBaseNormal;
                let seloBaseJovem = valorTotal * rateSelo;

                if (this.purpose === 'hpp') {
                    imtBaseJovem = this.calculateYoungIMT(valorTotal, this.location);
                    
                    // Selo Jovem
                    const limitIsencao = this.location === 'continente' ? 324058 : 405073;
                    const limitParcial = this.location === 'continente' ? 648022 : 810145;
                    
                    if (valorTotal <= limitIsencao) {
                        seloBaseJovem = 0;
                    } else if (valorTotal <= limitParcial) {
                        // Selo sobre o excedente
                        seloBaseJovem = (valorTotal - limitIsencao) * 0.008;
                    }
                }

                // 3. Dividir por Compradores (Quota Parte)
                let buyers = this.buyersCount;
                let finalIMT = 0;
                let finalStamp = 0;

                for (let i = 1; i <= buyers; i++) {
                    let isEligible = false;
                    
                    // Elegibilidade só em HPP e se marcado "Sim"
                    if (this.purpose === 'hpp') {
                        if (i === 1 && this.buyer1Eligible && this.buyer1Age <= 35) isEligible = true;
                        if (i === 2 && this.buyer2Eligible && this.buyer2Age <= 35) isEligible = true;
                    }

                    if (isEligible) {
                        // Comprador Jovem paga a sua quota do IMT Jovem
                        finalIMT += (imtBaseJovem / buyers);
                        finalStamp += (seloBaseJovem / buyers);
                    } else {
                        // Comprador Normal paga a sua quota do IMT Normal
                        finalIMT += (imtBaseNormal / buyers);
                        finalStamp += ((valorTotal * rateSelo) / buyers);
                    }
                }

                this.finalIMT = finalIMT;
                this.finalStamp = finalStamp;
                this.totalPayable = finalIMT + finalStamp;
            }
        }
    }
</script>

@endsection