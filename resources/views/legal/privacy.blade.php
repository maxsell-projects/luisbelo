@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="container mx-auto max-w-4xl px-4">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Política de Privacidade</h1>
            
            <div class="prose max-w-none text-gray-600 space-y-4">
                <p class="text-sm text-gray-500">Última atualização: {{ now()->format('d/m/Y') }}</p>

                <p>A presente Política de Privacidade regula o tratamento de dados pessoais efetuado através do website <strong>https://luisbelo.duckdns.org</strong>, da responsabilidade de <strong>Luís Belo</strong>, mediador imobiliário, AMI n.º 5579, NIPC 183509021, com escritório em Rua Serpa Pinto, 77 A, 2640-534 Mafra — Portugal, doravante designado por “Titular do Website”.</p>
                <p>O tratamento dos dados pessoais é realizado em conformidade com o Regulamento Geral sobre a Proteção de Dados (RGPD – Regulamento (UE) 2016/679) e demais legislação aplicável em Portugal.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">1. Dados Pessoais Recolhidos</h3>
                <ul class="list-disc pl-5">
                    <li>Nome</li>
                    <li>Endereço de correio eletrónico</li>
                    <li>Número de telefone</li>
                    <li>Informações fornecidas voluntariamente através de formulários de contacto</li>
                    <li>Dados técnicos de navegação (endereço IP, cookies, tipo de dispositivo e navegador)</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">2. Finalidade do Tratamento</h3>
                <ul class="list-disc pl-5">
                    <li>Responder a pedidos de contacto ou informação</li>
                    <li>Prestar serviços no âmbito da atividade de mediação imobiliária</li>
                    <li>Cumprir obrigações legais e regulamentares</li>
                    <li>Melhorar a experiência de utilização do website</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">3. Fundamento Legal</h3>
                <ul class="list-disc pl-5">
                    <li>No consentimento do titular dos dados</li>
                    <li>Na execução de diligências pré-contratuais</li>
                    <li>No cumprimento de obrigações legais</li>
                    <li>No interesse legítimo do Titular do Website</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">4. Conservação dos Dados</h3>
                <p>Os dados pessoais serão conservados apenas pelo período necessário às finalidades para as quais foram recolhidos ou pelo tempo legalmente exigido.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">5. Partilha de Dados</h3>
                <p>Os dados pessoais não são vendidos nem cedidos a terceiros, salvo quando tal seja exigido por lei.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">6. Direitos dos Titulares</h3>
                <p>O titular dos dados tem direito a:</p>
                <ul class="list-disc pl-5">
                    <li>Aceder aos seus dados pessoais</li>
                    <li>Solicitar a sua retificação ou eliminação</li>
                    <li>Limitar ou opor-se ao tratamento</li>
                    <li>Retirar o consentimento, quando aplicável</li>
                    <li>Apresentar reclamação junto da CNPD – Comissão Nacional de Proteção de Dados</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">7. Segurança</h3>
                <p>São adotadas medidas técnicas e organizativas adequadas para proteger os dados pessoais contra acesso não autorizado, perda ou divulgação indevida.</p>

                <h3 class="text-xl font-semibold text-gray-800 mt-6">8. Alterações</h3>
                <p>A presente Política de Privacidade pode ser atualizada a qualquer momento, sendo as alterações publicadas no website.</p>
            </div>
        </div>
    </div>
</div>
@endsection