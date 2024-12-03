<?php

namespace Database\Seeders;

use App\Models\Frontend\Transport;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::create([
             'name' => 'Ondrej Zelina',
             'email' => 'ondrej.web@gmail.com',
             'password' => bcrypt('Zelio_6236'),
         ]);

         Transport::create([
             'name' => 'DHL',
             'price' => 199,
             'currency' => 'CZK',
         ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
