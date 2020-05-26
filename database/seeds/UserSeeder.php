<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marc',
            'surname' => 'de Monserrat Navarro',
            'email' => 'marcdmn1999@gmail.com',
            'password' => Hash::make('marcDAW123'),
            'phone' => 651459199,
            'address' => 'Avda Constitución 52, 1º 1ª',
            'city' => 'Castelldefels',
            'province' => 'Barcelona',
            'cc_number' => 5664332188523347,
            'role' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
