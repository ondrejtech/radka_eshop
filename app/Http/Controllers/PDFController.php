<?php

namespace App\Http\Controllers;

use App\Models\Frontend\ShoppingCartController;
use App\Models\Payment\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function viewPDF($record)
    {
        $invoiceId = (int) $record;
        $invoice = Invoice::with(['items.product'])->find($invoiceId);
        $pdf = Pdf::loadView('pdf', ['invoice' => $invoice]);

        return $pdf->stream();
    }

    public function downloadPDF(ContractApartment $contractApartment)
    {
//        dd($contractApartment);
        $data = [
            [
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => '129.00'
            ]
        ];

        $pdf = Pdf::loadView('pdf', ['data' => $data]);

        return $pdf->download();
    }
}
