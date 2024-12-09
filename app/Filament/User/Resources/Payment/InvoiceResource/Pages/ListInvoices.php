<?php

namespace App\Filament\User\Resources\Payment\InvoiceResource\Pages;

use App\Filament\User\Resources\Payment\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
