<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileDescription = simplexml_load_file(asset('productsComplete.xml'));

        foreach ($fileDescription->SHOPITEM as $item) {
            $name = (string) $item->CATEGORIES->DEFAULT_CATEGORY;
            $parentCategory = (string) $item->CATEGORIES->DEFAULT_CATEGORY['id'];

            $result[] = [
                'category_code' => $parentCategory,
                'name' => $name,
            ];
        }

        $resultUniquie = array_unique($result, SORT_REGULAR);

        foreach ($resultUniquie as $category) {
            Category::updateOrCreate([
                'category_code' => $category['category_code'],
                'name' => $category['name'],
            ]);
        }

        echo 'Kategorie byly úspěšně aktualizovány';
    }
}
