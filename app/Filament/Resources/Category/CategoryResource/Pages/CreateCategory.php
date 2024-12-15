<?php

namespace App\Filament\Resources\Category\CategoryResource\Pages;

use App\Filament\Resources\Category\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
