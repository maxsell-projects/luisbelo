<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório Detalhado</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.5; }
        .header { text-align: center; border-bottom: 2px solid #BFA15F; margin-bottom: 20px; padding-bottom: 20px; }
        .section { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border-radius: 4px; }
        .label { font-weight: bold; font-size: 11px; text-transform: uppercase; color: #777; }
        .value { font-size: 14px; margin-bottom: 5px; }
        .result { font-size: 20px; font-weight: bold; color: #BFA15F; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Simulação de Mais-Valias</h1>
        <p>Cliente: {{ $data['lead_name'] }}</p>
    </div>

    <div class="section">
        <h3 style="margin-top: 0;">Dados Declarados</h3>
        <p><span class="label">Aquisição:</span> € {{ number_format($data['acquisition_value'], 2) }} ({{ $data['acquisition_month'] }}/{{ $data['acquisition_year'] }})</p>
        <p><span class="label">Venda:</span> € {{ number_format($data['sale_value'], 2) }} ({{ $data['sale_month'] }}/{{ $data['sale_year'] }})</p>
        <p><span class="label">Despesas:</span> {{ $data['has_expenses'] }} @if($data['has_expenses'] == 'Sim') (€ {{ number_format($data['expenses_value'], 2) }}) @endif</p>
        <p><span class="label">Rendimento Anual:</span> € {{ number_format($data['annual_income'], 2) }} (Conjunto: {{ $data['joint_tax_return'] }})</p>
    </div>

    <div class="section">
        <h3>Parâmetros Fiscais</h3>
        <p><span class="label">Venda ao Estado:</span> {{ $data['sold_to_state'] }}</p>
        <p><span class="label">HPP (>12 meses):</span> {{ $data['hpp_status'] }}</p>
        <p><span class="label">Amortizar Crédito:</span> {{ $data['amortize_credit'] }}</p>
        <p><span class="label">Apoio Público:</span> {{ $data['public_support'] }}</p>
    </div>

    <div style="background: #333; color: #fff; padding: 20px; border-radius: 4px;">
        <h3 style="color: #BFA15F; margin-top: 0;">Resultado Estimado</h3>
        <p>Mais-Valia Bruta: € {{ $results['gross_gain'] }}</p>
        <p>Correção Inflação: - € {{ $results['inflation_deduction'] }}</p>
        <hr style="border-color: #555;">
        <p>IMPOSTO A PAGAR (Estimativa):</p>
        <p class="result">€ {{ $results['estimated_tax'] }}</p>
        <p style="font-size: 10px; color: #ccc;">{{ $results['message'] }}</p>
    </div>
</body>
</html>