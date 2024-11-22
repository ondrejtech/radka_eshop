<?php

namespace Database\Seeders;

use App\Models\Frontend\Product;
use App\Models\Frontend\ProductImages;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $xmlFile = file_get_contents('public/productsComplete.xml');
        $xmlObject = simplexml_load_string($xmlFile);

        $json = json_encode($xmlObject);
        $xml = json_decode($json, true);

        if (isset($xml['SHOPITEM']) && count($xml['SHOPITEM']) > 0) {
            foreach ($xml['SHOPITEM'] as $key => $value) {
                echo $value['NAME'] . '<br>';
//                Product::create([
//                    'id' => $value['@attributes']['id'] ?? null,
//                    'name' => $value['NAME'],
//                    'standard_price' => 100,
//                    'currency' => 'CZK',
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);


            }
        }

//        if (isset($xml['SHOPITEM']) && count($xml['SHOPITEM']) > 0) {
//            foreach ($xml['SHOPITEM'] as $key => $value) {
//                $productId = $value['@attributes']['id'];
////
////                // Ověřte, zda produkt existuje
//
////
//                if (isset($value['IMAGES']['IMAGE'])) {
//                    $imagesData = $value['IMAGES']['IMAGE'];
//
//                    // Pokud je IMAGE string, převeďte ho na pole
//                    if (is_string($imagesData)) {
//                        $imagesData = [$imagesData];
//                    }
//
//                    // Vytvoření seznamu obrázků
//                    foreach ($imagesData as $imageURL) {
//                        $images[] = [
//                            'product_id' => $productId,
//                            'URL' => $imageURL,
//                            'created_at' => now(),
//                            'updated_at' => now(),
//                        ];
//                        ProductImages::create([
//                            'product_id' => $productId,
//                            'URL' => $imageURL,
//                        ]);
//                    }
//                }
//            }
//        }
    }
}
