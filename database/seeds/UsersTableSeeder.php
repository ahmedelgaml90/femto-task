<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ahmedelgaml',
            'email' => 'admin@dashboardd.com',
            'password' => bcrypt('secret'),
            'phone'=>'0144565655',
            'permission'=>1,
        ]);
    }
}
