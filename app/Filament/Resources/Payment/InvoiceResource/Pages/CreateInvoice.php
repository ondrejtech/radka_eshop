<?php

namespace App\Filament\Resources\Payment\InvoiceResource\Pages;

use App\Filament\Resources\Payment\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;
}
