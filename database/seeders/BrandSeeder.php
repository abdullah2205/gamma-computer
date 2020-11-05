<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //di use dulu gaes

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nama' => 'Asus',
            'logo' => 'asus.png',
        ]);

        DB::table('brands')->insert([
            'nama' => 'Lenovo',
            'logo' => 'lenovo.png',
        ]);

        DB::table('brands')->insert([
            'nama' => 'HP',
            'logo' => 'hp.png',
        ]);

        DB::table('brands')->insert([
            'nama' => 'Acer',
            'logo' => 'acer.png',
        ]);
    }
}
