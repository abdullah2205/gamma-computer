<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //di use dulu gaes

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
            'type' => 'ZenBook 13 UX325JA',
            //'price' => 2000000,
            'brand_id' => 1,
            //'is_ready' => false;
            'color' => 'Pine Grey',
            'os' => 'Windows 10 Home',
            'processor' => 'Intel® Core™ i7-1065G7',
            'graphics' => 'Intel® Iris™ Plus Graphics',
            'display' => '13.3” Full HD (1920 x 1080)',
            'memory' => '8GB / 16GB LPDDR4X 3200MHz',
            'storage' => '512GB PCIe® NVMe™ 3.0 x2 M.2 SSD',
            'image' => 'zenbook.jpeg',
        ]);

        DB::table('products')->insert([
            'type' => 'VivoBook Flip 14 TM420IA',
            'price' => 2000000,
            'brand_id' => 1,
            //'is_ready' => false;
            'color' => 'Bespoke Black',
            'os' => 'Windows 10 Home',
            'processor' => 'AMD Ryzen™ 7 4700U',
            'graphics' => 'ntegrated AMD Radeon™ Graphics',
            'display' => '14” LED-backlit Full HD (1920 x 1080)',
            'memory' => '8GB / 16GB 3200MHz DDR4',
            'storage' => '256GB / 512GB PCIe SSD',
            'image' => 'vivobook.jpeg',
        ]);
        
        DB::table('products')->insert([
            'type' => 'TUF Gaming FX505GT',
            'price' => 2000000,
            'brand_id' => 1,
            //'is_ready' => false;
            'color' => 'Tank Grey',
            'os' => 'Windows 10 Home',
            'processor' => 'Intel® Core™ i5 9300H',
            'graphics' => 'GeForce GTX 1650 GPU',
            'display' => '15.6" (16:9) LED-backlit FHD (1920x1080) Anti-Glare 144Hz',
            'memory' => '8GB, 2 x SO-DIMM socket for expansion',
            'storage' => '512GB PCIe® Gen3 x2 SSD',
            'image' => 'tuf.jpeg',
        ]);
    }
}
