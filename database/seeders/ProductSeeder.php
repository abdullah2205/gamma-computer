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
            'brand_id' => 1,
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
            'brand_id' => 1,
            'color' => 'Tank Grey',
            'os' => 'Windows 10 Home',
            'processor' => 'Intel® Core™ i5 9300H',
            'graphics' => 'GeForce GTX 1650 GPU',
            'display' => '15.6" (16:9) LED-backlit FHD (1920x1080) Anti-Glare 144Hz',
            'memory' => '8GB, 2 x SO-DIMM socket for expansion',
            'storage' => '512GB PCIe® Gen3 x2 SSD',
            'image' => 'tuf.jpeg',
        ]);

        DB::table('products')->insert([
            'type' => 'IdeaPad Gaming 3 (15”) AMD',
            'brand_id' => 2,
            'color' => 'Black',
            'os' => 'Windows 10 Home',
            'processor' => 'AMD® Ryzen™ 5 4600H',
            'graphics' => 'NVIDIA® GeForce® GTX 1650 4GB',
            'display' => '15.6" FHD (1920 x 1080) IPS, anti-glare, 250 nits, 120Hz',
            'memory' => '8GB DDR4 3200MHz',
            'storage' => '1 TB 5400 RPM HDD + 256 GB PCIe SSD',
            'image' => 'idea.webp',
        ]);

        DB::table('products')->insert([
            'type' => 'ThinkPad X1 Yoga Gen 5 (14”) 2-in-1 Laptop',
            'brand_id' => 2,
            'color' => 'Black',
            'os' => 'Windows 10 Pro',
            'processor' => 'Intel® Core™ i5-10210U',
            'graphics' => 'Integrated Intel® UHD Graphics',
            'display' => '14.0” UHD (3840 x 2160) IPS, anti-reflective, touchscreen',
            'memory' => '16 GB LPDDR3 2133MHz (Soldered)',
            'storage' => '512 GB PCIe SSD',
            'image' => 'think.webp',
        ]);

        DB::table('products')->insert([
            'type' => 'Yoga 9i (15”) 2 in 1 laptop',
            'brand_id' => 2,
            'color' => 'Black',
            'os' => 'Windows 10 Home',
            'processor' => 'Intel® Core™ i7-10750H',
            'graphics' => 'NVIDIA® GeForce® GTX 1650 Ti 4GB',
            'display' => '15.6" FHD (1920 x 1080) IPS, glossy, touchscreen',
            'memory' => '12 GB DDR4 2933MHz (Soldered)',
            'storage' => '512 GB PCIe SSD',
            'image' => 'yoga.webp',
        ]);
    }
}
