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
            'email' => 'c.davalos@demonsystem.com',
            'password' => bcrypt('cesar20894'),
            'admin' => true,
            'name' => 'Ventas demon',
            'email' => 'ventas@demonsystem.com',
            'password' => bcrypt('ventas2018'),
            'admin' => true
        ]);
    }
}
