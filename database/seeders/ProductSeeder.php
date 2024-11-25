<?php

namespace Database\Seeders;

use App\Models\Frontend\Product;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\ProductImages;
use http\Env\Response;
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
//        dd($xml);
        if (isset($xml['SHOPITEM']) && count($xml['SHOPITEM']) > 0) {
            foreach ($xml['SHOPITEM'] as $key => $value) {
                $price = 0;
                if(isset($value['PRICE'])){
                    $price = $value['PRICE'];
                }


                Product::create([
                    'id' => $value['@attributes']['id'] ?? null,
                    'name' => $value['NAME'],
//                    'description' => $value['DESCRIPTION'],
                    'standard_price' => $price,
                    'currency' => 'CZK',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


            }
        }

        if (isset($xml['SHOPITEM']) && count($xml['SHOPITEM']) > 0) {
            foreach ($xml['SHOPITEM'] as $key => $value) {
                $productId = $value['@attributes']['id'];
//
//                // Ověřte, zda produkt existuje

//
                if (isset($value['IMAGES']['IMAGE'])) {
                    $imagesData = $value['IMAGES']['IMAGE'];

                    // Pokud je IMAGE string, převeďte ho na pole
                    if (is_string($imagesData)) {
                        $imagesData = [$imagesData];
                    }

//                    // Vytvoření seznamu obrázků
                    foreach ($imagesData as $imageURL) {

                        ProductImages::create([
                            'product_id' => $productId,
                            'URL' => $imageURL,
                        ]);
                    }
                }
            }
        }
    }
}
