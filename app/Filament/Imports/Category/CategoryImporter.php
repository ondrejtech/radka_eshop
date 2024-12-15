<?php

namespace App\Filament\Imports\Category;

use App\Models\Category\Category;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryImporter extends Importer
{
    protected static ?string $model = Category::class;
    public $category;

    public static function getColumns(): array
    {
        return [

            ImportColumn::make('category_code'),
            ImportColumn::make('name'),
            ImportColumn::make('parent_id')
        ];
    }

    /**
     * Resolve the record (either create a new one or update an existing one).
     *
     * @return Category|null
     */
    public function resolveRecord(): ?Category
    {
        // Získání nebo vytvoření nové kategorie
        $category = Category::firstOrNew(['category_code' => $this->data['category_code']]);

        // Naplnění dalších polí
        $category->name = $this->data['name'] ?? null;
        $category->parent_id = $this->data['parent_id'] ?? 0;

        // Uložení modelu
        $category->save();

        Log::info('Kategorie uložena', ['category' => $category]);

        return $category;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your category import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
