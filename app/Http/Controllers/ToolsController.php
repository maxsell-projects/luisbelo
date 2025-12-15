<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class ToolsController extends Controller
{
    public function showGainsSimulator()
    {
        return view('tools.gains');
    }

    public function calculateGains(Request $request)
    {
        $validated = $request->validate([
            'acquisition_year' => 'required|integer|min:1901|max:2025',
            'acquisition_month' => 'required|string',
            'acquisition_value' => 'required|numeric|min:0',
            'sale_year' => 'required|integer|min:1901|max:2025',
            'sale_month' => 'required|string',
            'sale_value' => 'required|numeric|min:0',
            'has_expenses' => 'required|string|in:Sim,Não',
            'expenses_value' => 'nullable|numeric|min:0',
            'sold_to_state' => 'required|string|in:Sim,Não',
            'hpp_status' => 'required|string',
            'amortize_credit' => 'required|string|in:Sim,Não',
            'joint_tax_return' => 'required|string|in:Sim,Não',
            'annual_income' => 'required|numeric|min:0',
            'public_support' => 'required|string|in:Sim,Não',
            'lead_name' => 'required|string|max:255',
            'lead_email' => 'required|email|max:255',
        ]);

        $results = $this->performCalculation($validated);

        $pdf = Pdf::loadView('pdfs.simulation', ['data' => $validated, 'results' => $results]);

        Mail::send([], [], function ($message) use ($validated, $pdf) {
            $message->to($validated['lead_email'])
                ->subject('Relatório de Simulação de Mais-Valias')
                ->attachData($pdf->output(), 'simulacao-mais-valias.pdf');
        });

        return response()->json($results);
    }

    private function performCalculation($data)
    {
        if ($data['sold_to_state'] === 'Sim') {
            return $this->getEmptyResult('Isento (Venda ao Estado/Entidade Pública)');
        }

        if ($data['acquisition_year'] < 1989) {
            return $this->getEmptyResult('Isento (Imóvel adquirido antes de 1989)');
        }

        $coefficients = [
            2025 => 1.00, 2024 => 1.00, 2023 => 1.00, 2022 => 1.01, 2021 => 1.01,
            2020 => 1.01, 2019 => 1.01, 2018 => 1.02, 2017 => 1.03, 2016 => 1.03,
            2015 => 1.04, 2014 => 1.05, 2013 => 1.06, 2012 => 1.07, 2011 => 1.08,
            2010 => 1.09, 2009 => 1.10, 2008 => 1.11, 2007 => 1.13, 2006 => 1.16,
            2005 => 1.19, 2004 => 1.22, 2003 => 1.25, 2002 => 1.29, 2001 => 1.34,
            2000 => 1.39, 1999 => 1.43, 1998 => 1.47, 1997 => 1.51, 1996 => 1.56,
            1995 => 1.62, 1994 => 1.68, 1993 => 1.77, 1992 => 1.88, 1991 => 2.06,
            1990 => 2.33, 1901 => 2.50
        ];

        $year = $data['acquisition_year'];
        $coef = $coefficients[$year] ?? ($year < 1990 ? 2.50 : 1.00);

        $purchaseUpdated = $data['acquisition_value'] * $coef;
        $inflationDeduction = $purchaseUpdated - $data['acquisition_value'];

        $expenses = ($data['has_expenses'] === 'Sim') ? ($data['expenses_value'] ?? 0) : 0;
        
        $grossGain = $data['sale_value'] - $purchaseUpdated - $expenses;
        
        if ($grossGain <= 0) {
            return $this->getEmptyResult('Sem Mais-Valia (Menos-Valia apurada)');
        }

        $taxablePercent = 0.50;
        
        if ($data['public_support'] === 'Sim') {
        }

        $isHPP = $data['hpp_status'] === 'Sim';
        
        $amortizationBenefit = 0;
        
        if ($isHPP && $data['amortize_credit'] === 'Sim') {
            $amortizationBenefit = $grossGain; 
        }

        $finalTaxable = max(0, ($grossGain - $amortizationBenefit) * $taxablePercent);

        $incomeForBracket = $data['annual_income'];
        if ($data['joint_tax_return'] === 'Sim') {
            $incomeForBracket = ($data['annual_income'] + $finalTaxable) / 2;
        } else {
            $incomeForBracket += $finalTaxable;
        }

        $taxRate = match(true) {
            $incomeForBracket <= 7703 => 0.145,
            $incomeForBracket <= 11623 => 0.21,
            $incomeForBracket <= 16472 => 0.265,
            $incomeForBracket <= 21321 => 0.285,
            $incomeForBracket <= 27142 => 0.35,
            $incomeForBracket <= 39791 => 0.37,
            $incomeForBracket <= 51997 => 0.435,
            $incomeForBracket <= 81199 => 0.45,
            default => 0.48
        };

        $estimatedTax = $finalTaxable * $taxRate;
        
        if ($data['joint_tax_return'] === 'Sim') {
            $estimatedTax = $estimatedTax * 2; 
        }

        return [
            'gross_gain' => number_format($grossGain, 2, ',', '.'),
            'taxable_gain' => number_format($finalTaxable, 2, ',', '.'),
            'estimated_tax' => number_format($estimatedTax, 2, ',', '.'),
            'inflation_deduction' => number_format($inflationDeduction, 2, ',', '.'),
            'coefficient' => $coef,
            'status' => 'Tributável',
            'message' => 'Cálculo realizado com sucesso.'
        ];
    }

    private function getEmptyResult($message)
    {
        return [
            'gross_gain' => '0,00',
            'taxable_gain' => '0,00',
            'estimated_tax' => '0,00',
            'inflation_deduction' => '0,00',
            'coefficient' => 'N/A',
            'status' => 'Isento/Sem Valor',
            'message' => $message
        ];
    }
}