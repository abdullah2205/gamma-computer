<?php

namespace Database\Seeders;

use App\Models\User; //import dulu gaes
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gamma.computer.com',
            'password' => bcrypt('admingamma'),
        ]);
        $admin->assignRole('admin');

        // $user = User::create([
        //     'name' => 'User Gamma',
        //     'email' => 'user@gamma.computer.com',
        //     'password' => bcrypt('user1234'),
        // ]);
        // $user->assignRole('user');
    }
}
