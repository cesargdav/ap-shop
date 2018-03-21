<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'César Gutiérrez',
            'email' => 'cesg.dav@gmail.com',
            'password' => bcrypt('cesar20894'),
            'admin' => true
        ]);
    }
}
