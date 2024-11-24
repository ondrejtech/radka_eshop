<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Wishlist;
use App\Models\Frontend\ProductImages;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Storage;

class ImageScrapeController extends Controller
{
    public function index()
    {
        $client = new Client();

        // Předpokládáme, že máme v databázi URL obrázků
        $images = ProductImages::all();


        foreach ($images as $url) {
                // Pošleme GET požadavek na URL
                $response = $client->request('GET', $url->URL);

                // Získáme obsah obrázku (binární data)
                $imageContent = $response->getBody()->getContents();


                // Získáme název souboru z URL (např. obrázek.jpg)
                $imageName = basename($url->URL);
                $position = strpos($url, '.jpg');
                $newUrl = preg_replace('/\.jpg.*$/', '.jpg', $imageName);
                $imageName = basename($url->first()->product_id.$newUrl);
                // Uložíme obrázek na disk (do složky public/images)
                Storage::disk('public')->put('images/pimpinela/' . $imageName, $imageContent);

                Wishlist::where('id', $url->product_id)->update(['image_name' => $url->product_id.$imageName]);
        }
    }
}
