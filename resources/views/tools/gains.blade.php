<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8" x-data="{
        hasExpenses: false,
        reinvesting: false,
        amortizing: false,
        govtSupport: false
    }">
        <div class="lg:col-span-8 space-y-8">
            <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Dados da Aquisição e Venda</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Valor de Aquisição (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500 transition-colors" placeholder="Ex: 150000.00">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ano</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                                @foreach(range(date('Y'), 1900) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mês</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                                @foreach(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'] as $index => $month)
                                    <option value="{{ $index + 1 }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Valor de Venda (Realização) (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500 transition-colors" placeholder="Ex: 300000.00">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ano</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                                @foreach(range(date('Y'), 1900) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mês</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                                @foreach(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'] as $index => $month)
                                    <option value="{{ $index + 1 }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Despesas e Encargos</h2>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Teve despesas e encargos (obras, IMT, Imposto do selo, outros)?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="has_expenses" value="1" x-model="hasExpenses" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center hover:bg-gray-50 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">
                                Sim
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="has_expenses" value="0" x-model="hasExpenses" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center hover:bg-gray-50 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">
                                Não
                            </div>
                        </label>
                    </div>
                </div>

                <div x-show="hasExpenses" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 bg-gray-50 p-4 rounded-lg">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">IMT e Imposto do Selo (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Encargos Notariais/Registo (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Comissão Imobiliária (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Obras e Melhorias (últimos 12 anos) (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500 text-sm">
                    </div>
                </div>
            </section>

            <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Condições Fiscais e Isenções</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Venda feita ao Estado, RA ou autarquias?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="sold_to_state" value="1" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="sold_to_state" value="0" class="peer sr-only" checked>
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Era Habitação Própria Permanente (HPP) há pelo menos 12 meses?</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_hpp" value="yes" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_hpp" value="less_12" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim, há menos de 12 meses</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="is_hpp" value="no" class="peer sr-only" checked>
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Está reformado ou tem mais de 65 anos?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="retired" value="1" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="retired" value="0" class="peer sr-only" checked>
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                </div>
            </section>

            <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Reinvestimento e Amortização</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Pretende reinvestir noutra HPP?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="will_reinvest" value="1" x-model="reinvesting" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="will_reinvest" value="0" x-model="reinvesting" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                    <div x-show="reinvesting" x-transition class="mt-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Valor a Reinvestir (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Pretende amortizar crédito habitação?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="will_amortize" value="1" x-model="amortizing" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="will_amortize" value="0" x-model="amortizing" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                    <div x-show="amortizing" x-transition class="mt-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Valor a Amortizar (€)</label>
                        <input type="number" step="0.01" class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                    </div>
                </div>
            </section>

            <section class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Cenário IRS</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Declaração fiscal conjunta?</label>
                        <div class="flex gap-4">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="joint_tax" value="1" class="peer sr-only">
                                <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="joint_tax" value="0" class="peer sr-only" checked>
                                <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Rendimento Anual Coletável (€)</label>
                        <input type="number" step="0.01" placeholder="Ex: 25000.00" class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                    </div>
                </div>

                <div class="pt-4 border-t">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Beneficiou de apoio não reembolsável (>30% VPT)?</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="govt_support" value="1" x-model="govtSupport" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Sim</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="govt_support" value="0" x-model="govtSupport" class="peer sr-only">
                            <div class="rounded-lg border border-gray-200 p-3 text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 transition-all font-medium">Não</div>
                        </label>
                    </div>
                    <div x-show="govtSupport" x-transition class="mt-4 grid grid-cols-2 gap-4">
                         <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Ano Recebimento</label>
                            <select class="w-full rounded-lg border-gray-300 text-sm">
                                @foreach(range(date('Y'), 1980) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                             <label class="block text-sm font-medium text-gray-600 mb-1">Mês Recebimento</label>
                            <select class="w-full rounded-lg border-gray-300 text-sm">
                                @foreach(['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'] as $i => $m)
                                    <option value="{{ $i+1 }}">{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="lg:col-span-4">
            <div class="sticky top-6 space-y-6">
                <div class="bg-orange-500 rounded-xl p-6 text-white shadow-lg">
                    <h3 class="text-lg font-semibold opacity-90 mb-1">Imposto a pagar aproximadamente:</h3>
                    <div class="text-4xl font-bold mb-6">64.027,32€</div>
                    
                    <div class="grid grid-cols-2 gap-4 border-t border-orange-400 pt-4">
                        <div>
                            <div class="text-xs opacity-80 mb-1">Mais-valia Total</div>
                            <div class="text-xl font-bold">304.000€</div>
                        </div>
                        <div>
                            <div class="text-xs opacity-80 mb-1">Parte Tributável (50%)</div>
                            <div class="text-xl font-bold">152.000€</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="flex border-b border-gray-200 bg-gray-50">
                        <button class="flex-1 py-3 text-sm font-bold text-gray-800 border-b-2 border-orange-500 bg-white">Mais-valia</button>
                        <button class="flex-1 py-3 text-sm font-medium text-gray-500 hover:text-gray-700">Imposto IRS</button>
                    </div>
                    <div class="p-5 space-y-3 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Valor de venda</span>
                            <span class="font-bold text-gray-900">1.000.000€</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Coef. atualização</span>
                            <span class="font-medium text-gray-900">1.16</span>
                        </div>
                        <div class="flex justify-between items-center text-red-600">
                            <span>Valor aquisição atualizado</span>
                            <span class="font-medium">– 696.000€</span>
                        </div>
                        <div class="flex justify-between items-center text-red-600">
                            <span>Despesas e encargos</span>
                            <span class="font-medium">– 0€</span>
                        </div>
                        <div class="flex justify-between items-center text-green-600 pt-2 border-t border-gray-100">
                            <span class="font-bold">Mais-valia Apurada</span>
                            <span class="font-bold">304.000€</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">
                    <h4 class="font-bold text-blue-900 mb-2">Nota Legal</h4>
                    <p class="text-xs text-blue-800 leading-relaxed">
                        O saldo positivo entre as mais-valias e as menos-valias é englobado em 50% do seu valor (Art. 43º nº2 CIRS). Este simulador utiliza os escalões do Continente.
                    </p>
                </div>

                <button class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-0.5">
                    Calcular Agora
                </button>
            </div>
        </div>
    </div>
</div>