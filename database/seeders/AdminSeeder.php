<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        $user = User::create([
            'first_name'    => 'Super',
            'last_name'     => 'Admin',
            'email'         =>  'admin@anef.com',
            'mobile_number' =>  '0611111111',
            'password'      =>  Hash::make('admin.seaf@2023'),
            'role_id'       => 1
        ]);
        $user2 = User::create([
            'first_name'    => 'Utilisateur',
            'last_name'     => 'ANEF',
            'email'         =>  'utilisateur@anef.com',
            'mobile_number' =>  '0622222222',
            'password'      =>  Hash::make('seaf.2023'),
            'role_id'       => 2
        ]);
    }
}
