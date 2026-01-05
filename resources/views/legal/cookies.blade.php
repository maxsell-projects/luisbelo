@extends('layouts.app')

@section('title', 'Política de Cookies | Luís Belo')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="container mx-auto max-w-4xl px-4">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Política de Cookies</h1>
            
            <div class="prose max-w-none text-gray-600 space-y-4">
                <p>O website <strong>https://luisbelo.duckdns.org</strong> utiliza cookies para garantir o seu correto funcionamento e melhorar a experiência do utilizador.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">1. O que são Cookies</h3>
                <p>Cookies são pequenos ficheiros de texto armazenados no dispositivo do utilizador quando este visita um website.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">2. Tipos de Cookies Utilizados</h3>
                <ul class="list-disc pl-5">
                    <li><strong>Cookies essenciais:</strong> necessários para o funcionamento do website;</li>
                    <li><strong>Cookies analíticos:</strong> recolhem dados estatísticos anónimos;</li>
                    <li><strong>Cookies funcionais:</strong> permitem memorizar preferências do utilizador.</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">3. Finalidade</h3>
                <p>Os cookies permitem:</p>
                <ul class="list-disc pl-5">
                    <li>Garantir o correto funcionamento do website;</li>
                    <li>Analisar padrões de navegação;</li>
                    <li>Melhorar a usabilidade e desempenho.</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">4. Gestão de Cookies</h3>
                <p>O utilizador pode configurar ou desativar os cookies através das definições do seu navegador. A desativação de cookies essenciais pode comprometer o funcionamento do website.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">5. Alterações</h3>
                <p>Esta Política de Cookies pode ser atualizada sempre que necessário.</p>
            </div>
        </div>
    </div>
</div>
@endsection