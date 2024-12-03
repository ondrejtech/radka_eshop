<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Frontend\Product;

class TestController extends Controller
{
    public function xml()
    {
//        $fileDescription = simplexml_load_file(asset('productsComplete.xml'));
//        $description = $fileDescription->SHOPITEM->DESCRIPTION;
//        $descriptionText = (string) $description;
//        dump($descriptionText);

        $fileDescription = simplexml_load_file(asset('productsComplete.xml'));

// Procházejte všechny SHOPITEM elementy
        foreach ($fileDescription->SHOPITEM as $item) {
            // Získání ID produktu (pokud je v atributu)
            $id = (string) $item['id']; // Pokud je ID atributem elementu SHOPITEM

            // Získání popisu produktu
            $descriptionText = (string) $item->DESCRIPTION; // Popis je text uvnitř elementu DESCRIPTION
            $shorDescription = (string) $item->SHORT_DESCRIPTION; // Popis je text uvnitř elementu DESCRIPTION
            $parentCategory = intval($item->CATEGORIES->DEFAULT_CATEGORY['id']);
            $uniqueCategories[] = $parentCategory;
            $uniqueCategories = array_unique($uniqueCategories);

            // Výpis ID a popisu produktu
//            echo "ID produktu: " . $id . "<br>";
//            echo "Popis produktu: " . $shorDescription . "<br><br>";

            Product::where('id', $id)->update([
                'description' => $descriptionText,
                'short_description' => $shorDescription,
                'category_code' => $parentCategory,
            ]);


        }
        echo 'Proudukty byly úspěšně aktualizovány'. '<br>';

        foreach($uniqueCategories as $category){
            Category::updateOrCreate([
                'id' => $category['id'],
                'category_code' => $category['id'],
                'name' => $category,
            ]);


        }

        echo 'Kategorie byly úspěšně aktualizovány';
    }
}
