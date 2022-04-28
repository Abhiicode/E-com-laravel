<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=>'Lg refrigerator',
            'price'=>'27000',
            'description'=>'A Fridge consist of every feature',
            'category'=>'refrigerator',
            'gallery'=>'https://www.lg.com/in/images/refrigerators/md07529611/gallery/GL-B191KRGB-Refrigerators-Left-View-D-05.jpg',
            ],
            [
            'name'=>'Google Pixel',
            'price'=>'57000',
            'description'=>'A Smartphone that can change your future',
            'category'=>'mobile',
            'gallery'=>'https://www.androidauthority.com/wp-content/uploads/2021/11/Google-Pixel-6-and-Pixel-6-Pro-backs-in-hand.jpg',
            ],
            [
            'name'=>'RedMi Note 10 pro',
            'price'=>'20000',
            'description'=>'A Smartphone thats number 1 in a market',
            'category'=>'mobile',
            'gallery'=>'https://i02.appmifile.com/998_operator_in/12/08/2021/3c3be7deaa0112fa9c5c4c0c3e1da35d.png',
            ]
        ]);
    }
}
