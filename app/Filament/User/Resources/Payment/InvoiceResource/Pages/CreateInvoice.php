<?php

namespace App\Filament\User\Resources\Payment\InvoiceResource\Pages;

use App\Filament\User\Resources\Payment\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;
}
